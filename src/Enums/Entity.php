<?php

declare(strict_types=1);

namespace Funxtion\Enums;

enum Entity: string
{
    case EXERCISE = 'exercise';
    case ON_DEMAND = 'on-demand';
    case WORKOUT = 'workout';
    case TRAINING_PLAN = 'training-plan';
}
