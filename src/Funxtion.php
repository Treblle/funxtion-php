<?php

declare(strict_types=1);

namespace Funxtion;

use Funxtion\Enums\Language;
use Funxtion\Resources\ExerciseResource;

final readonly class Funxtion
{
    public function __construct(
        protected string $token,
        protected string $url,
        protected Language $language,
    ) {}

    public function exercises(): ExerciseResource
    {
        return new ExerciseResource(
            funxtion: $this,
        );
    }

    public function token(): string
    {
        return $this->token;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function language(): Language
    {
        return $this->language;
    }
}
