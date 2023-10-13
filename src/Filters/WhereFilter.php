<?php

declare(strict_types=1);

namespace Funxtion\Filters;

use Funxtion\Enums\Operator;

final readonly class WhereFilter implements Filter
{
    public function __construct(
        public string $key,
        public string $value,
        public null|Operator $operator = null,
        public string $filter = 'where',
    ) {
    }

    public function toQueryParameter(): string
    {
        $query = "filter[{$this->filter}][{$this->key}]";

        if ($this->operator) {
            $query .= "[{$this->operator}->value]";
        }

        $query .= "={$this->value}";

        return $query;
    }
}
