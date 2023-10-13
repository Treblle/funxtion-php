<?php

declare(strict_types=1);

namespace Funxtion\Filters;

final readonly class SortFilter implements Filter
{
    public function __construct(
        public string $key,
        public string $filter = 'order',
        public string $direction = 'desc',
    ) {
    }

    public function toQueryParameter(): string
    {
        return "filter[{$this->filter}][{$this->key}]={$this->direction}";
    }
}
