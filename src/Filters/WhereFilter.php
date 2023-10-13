<?php

declare(strict_types=1);

namespace Funxtion\Filters;

use Funxtion\Enums\Operator;

final class WhereFilter extends Filter
{
    public function __construct(
        public readonly string $key,
        public readonly string $value,
        public readonly null|Operator $operator = null,
        public readonly string $filter = 'where',
    ) {
    }
}
