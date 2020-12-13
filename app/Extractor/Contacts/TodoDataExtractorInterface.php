<?php

namespace App\Extractor\Contacts;

interface TodoDataExtractorInterface
{
    public function setData(array $data): void;

    public function getSlug(): string;

    public function getLevel(): int;

    public function getDuration(): int;
}
