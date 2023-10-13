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
interface Filter
{
    public function toQueryParameter(): string;
}
