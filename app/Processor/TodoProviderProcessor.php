<?php

namespace App\Processor;

use App\Extractor\Contacts\TodoDataExtractorInterface;

class TodoProviderProcessor
{
    private TodoDataExtractorInterface $todoDataExtractor;

    public function __construct(TodoDataExtractorInterface $todoDataExtractor)
    {
        $this->todoDataExtractor = $todoDataExtractor;
    }

    public function process(string $data): array
    {
        $datum = json_decode($data, true);

        $return = [];

        foreach ($datum as $row) {
            $this->todoDataExtractor->setData($row);

            $return[] = [
                'slug' => $this->todoDataExtractor->getSlug(),
                'level' => $this->todoDataExtractor->getLevel(),
                'duration' => $this->todoDataExtractor->getDuration()
            ];
        }

        return $return;
    }
}
