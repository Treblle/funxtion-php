<?php

declare(strict_types=1);

namespace Funxtion\Enums;

enum Operator: string
{
    case IN = 'in';
    case CONTAINS = 'contains';
    case EQUALS = 'eq';
    case AND = 'and';
}
