<?php

declare(strict_types=1);

namespace Funxtion\Enums;

enum Phase: string
{
    case SINGLE = 'single-exercises';
    case SUPERSET = 'superset';
    case CIRCUIT_TIME = 'circuit-time';
    case CIRCUIT_REPS = 'circuit-reps';
    case AMRAP = 'amrap';
    case RFT = 'rft';
    case EMOM = 'emom';
}
