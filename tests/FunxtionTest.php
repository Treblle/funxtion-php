<?php

declare(strict_types=1);

namespace Tests;

use Funxtion\Enums\Language;
use Funxtion\Funxtion;
use Funxtion\Resources\ExerciseResource;

final class FunxtionTest extends PackageTestCase
{
    /** @test */
    public function it_can_create_a_new_funxtion_class(): void
    {
        $this->assertInstanceOf(
            expected: Funxtion::class,
            actual: new Funxtion(
                token: '1234',
                url: 'https://api.funxtion.com/v3',
                language: Language::EN,
            ),
        );
    }

    /** @test */
    public function it_can_access_the_token(): void
    {
        $funxtion = new Funxtion(
            token: '1234',
            url: 'https://api.funxtion.com/v3',
            language: Language::EN,
        );

        $this->assertIsString(
            actual: $funxtion->token(),
        );

        $this->assertEquals(
            expected: '1234',
            actual: $funxtion->token(),
        );
    }

    /** @test */
    public function it_can_access_the_url(): void
    {
        $funxtion = new Funxtion(
            token: '1234',
            url: 'https://api.funxtion.com/v3',
            language: Language::EN,
        );

        $this->assertIsString(
            actual: $funxtion->url(),
        );

        $this->assertEquals(
            expected: 'https://api.funxtion.com/v3',
            actual: $funxtion->url(),
        );
    }

    /** @test */
    public function it_can_access_the_language(): void
    {
        $funxtion = new Funxtion(
            token: '1234',
            url: 'https://api.funxtion.com/v3',
            language: Language::EN,
        );

        $this->assertInstanceOf(
            expected: Language::class,
            actual: $funxtion->language(),
        );
    }

    /** @test */
    public function it_can_access_the_exercise_resource(): void
    {
        $funxtion = new Funxtion(
            token: '1234',
            url: 'https://api.funxtion.com/v3',
            language: Language::EN,
        );

        $this->assertInstanceOf(
            expected: ExerciseResource::class,
            actual: $funxtion->exercises(),
        );
    }
}
