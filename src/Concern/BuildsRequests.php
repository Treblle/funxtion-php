<?php

declare(strict_types=1);

namespace Funxtion\Concern;

use Funxtion\Enums\Language;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication\Bearer;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

trait BuildsRequests
{
    public function client(
        string $token,
        null|Language $language = null,
        null|ClientInterface $client = null,
    ): PluginClient {
        return new PluginClient(
            client: $client ?? Psr18ClientDiscovery::find(),
            plugins: [
                new AuthenticationPlugin(
                    authentication: new Bearer(
                        token: $token,
                    ),
                ),
                new HeaderDefaultsPlugin(
                    headers: [
                        'Content-Type' => 'application/json',
                        'Accept-Language' => $language->value ?? Language::EN->value,
                    ],
                ),
            ],
        );
    }

    public function request(string $method, string $endpoint): RequestInterface
    {
        return Psr17FactoryDiscovery::findRequestFactory()->createRequest(
            method: $method,
            uri: $endpoint,
        );
    }
}
