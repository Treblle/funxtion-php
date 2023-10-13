<?php

declare(strict_types=1);

namespace Funxtion\Filters;

final class SortFilter extends Filter
{
    public function __construct(
        public readonly string $key,
        public readonly string $filter = 'order',
        public readonly string $direction = 'desc',
    ) {
    }

    public function toQueryParameter(): string
    {
        return "filter[{$this->filter}][{$this->key}]={$this->direction}";
    }
}
