<?php

namespace App\Console\Commands;

use App\Helpers\ProviderHandler;
use App\Models\Todo;
use App\Processor\TodoProviderProcessor;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class GetTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todos:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Todo Jobs from Provider Services';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client([
            'base_uri' => config('constant.provider_base_uri')
        ]);
        $providers = config('constant.providers');
        $results = [];

        foreach ($providers as $provider){
            $response = $client->get($provider);
            $respJson = $response->getBody()->getContents();

            $providerExtractor = ProviderHandler::handle($respJson);
            $todoProviderProcessor = new TodoProviderProcessor($providerExtractor);
            $results = array_merge($results, $todoProviderProcessor->process($respJson));
        }

        Todo::insert($results);

        echo 'Todos has been created';

    }
}
