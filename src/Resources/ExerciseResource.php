<?php

declare(strict_types=1);

namespace Funxtion\Resources;

use Funxtion\Concern\BuildsRequests;
use Funxtion\Filters\Filter;
use Funxtion\Funxtion;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

final readonly class ExerciseResource
{
    use BuildsRequests;

    public function __construct(
        private Funxtion $funxtion,
    ) {}

    /**
     * @param Filter ...$filters
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function list(Filter ...$filters): ResponseInterface
    {
        $client = $this->client(
            token: $this->funxtion->token(),
            language: $this->funxtion->language(),
        );

        $request = $this->request(
            method: 'GET',
            endpoint: "{$this->funxtion->url()}/content/fitness/exercises",
        );

        foreach ($filters as $filter) {
            $request->getUri()->withQuery(
                query: $filter->toQueryParameter(),
            );
        }

        return $client->sendRequest(
            request: $request,
        );
    }
}
