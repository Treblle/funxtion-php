<?php

declare(strict_types=1);

namespace Funxtion\Filters;

final readonly class PaginationFilter implements Filter
{
    public function __construct(
        public int $limit,
        public null|int $offset = null,
    ) {
    }

    public function toQueryParameter(): string
    {
        $filter = "filter[limit]={$this->limit}";

        if ($this->offset) {
            $filter .= "&filter[offset]={$this->offset}";
        }

        return $filter;
    }
}
