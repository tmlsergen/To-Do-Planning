<?php

namespace App\Helpers;

use App\Extractor\Base\Provider1TodoDataExtractor;
use App\Extractor\Base\Provider2TodoDataExtractor;
use App\Extractor\Contacts\TodoDataExtractorInterface;

class ProviderHandler
{
    private const STRING_PARAM = 'zorluk';

    public static function handle(string $data) : TodoDataExtractorInterface
    {
        return strpos($data, self::STRING_PARAM) ? new Provider1TodoDataExtractor() : new Provider2TodoDataExtractor();
    }
}
