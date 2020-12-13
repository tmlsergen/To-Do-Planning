<?php

namespace App\Extractor\Base;

use App\Extractor\Contacts\TodoDataExtractorInterface;

class Provider2TodoDataExtractor implements TodoDataExtractorInterface
{

    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getSlug(): string
    {
        return key($this->data);
    }

    public function getLevel(): int
    {
        return $this->data[$this->getSlug()]['level'];
    }

    public function getDuration(): int
    {
        return $this->data[$this->getSlug()]['estimated_duration'];
    }
}
