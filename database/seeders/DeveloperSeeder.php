<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++){
            Developer::create([
                'slug' => 'dev'.$i,
                'name' => 'Developer '. $i,
                'level' => $i
            ]);
        }
    }
}







