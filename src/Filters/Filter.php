<?php

declare(strict_types=1);

namespace Funxtion\Filters;

use Funxtion\Enums\Operator;

/**
 * @property-read string $key
 * @property-read string $value
 * @property-read null|Operator $operator
 * @property-read string $filter
 */
abstract class Filter
{
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
