<?php

declare(strict_types=1);

namespace Funxtion\Filters;

use Funxtion\Enums\Direction;

final readonly class SortFilter implements Filter
{
    public function __construct(
        public string $key,
        public Direction $direction,
        public string $filter = 'order',
    ) {
    }

    public function toQueryParameter(): string
    {
        return "filter[{$this->filter}][{$this->key}]={$this->direction->value}";
    }
}
