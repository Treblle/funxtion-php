<?php

declare(strict_types=1);

namespace Funxtion\Enums;

enum Mime: string
{
    case VIDEO = 'video/mp4';
    case GIF = 'image/gif';
    case PNG = 'image/png';
}
