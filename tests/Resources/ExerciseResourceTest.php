<?php

declare(strict_types=1);

namespace Tests\Resources;

use Funxtion\Enums\Language;
use Funxtion\Funxtion;
use Funxtion\Resources\ExerciseResource;
use Http\Client\Common\PluginClient;
use Http\Mock\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Tests\PackageTestCase;

final class ExerciseResourceTest extends PackageTestCase
{
    /** @test */
    public function it_can_build_a_new_exercise_resource(): void
    {
        $this->assertInstanceOf(
            expected: ExerciseResource::class,
            actual: $this->newResource(),
        );
    }

    /** @test */
    public function it_can_create_the_plugin_client(): void
    {
        $this->assertInstanceOf(
            expected: PluginClient::class,
            actual: $this->newResource()->client(
                token: '1234',
                language: Language::EN,
            ),
        );
    }

    public function it_can_build_a_new_psr_request(): void
    {
        $this->assertInstanceOf(
            expected: ResponseInterface::class,
            actual: $this->newResource()->request(
                method: 'POST',
                endpoint: '/',
            ),
        );
    }

    /** @test */
    public function it_can_call_the_list_exercises_endpoint(): void
    {
        $resource = $this->newResource(
            client: new Client(),
        );

        $response = $this->createMock(
            originalClassName: ResponseInterface::class,
        );

        $this->assertInstanceOf(
            expected: ResponseInterface::class,
            actual: $resource->list(),
        );
    }

    protected function newResource(null|ClientInterface $client = null): ExerciseResource
    {
        return new ExerciseResource(
            funxtion: new Funxtion(
                token: '1234',
                url: 'https://api.funxtion.com/v3',
                language: Language::EN,
            ),
            client: $client,
        );
    }
}
