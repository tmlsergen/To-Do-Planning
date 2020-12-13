<?php

namespace App\Extractor\Base;

use App\Extractor\Contacts\TodoDataExtractorInterface;

class Provider1TodoDataExtractor implements TodoDataExtractorInterface
{
    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getSlug(): string
    {
        return $this->data['id'];
    }

    public function getLevel(): int
    {
        return $this->data['zorluk'];
    }

    public function getDuration(): int
    {
        return $this->data['sure'];
    }
}
