<?php

declare(strict_types=1);

namespace Funxtion\Enums;

enum Duration: string
{
    case TO_FIFTEEN = '0-15';
    case TO_THIRTY = '16-30';
    case TO_FORTY_FIVE = '31-45';
    case TO_SIXTY = '46-60';
    case OVER_SIXTY = '61+';
}
