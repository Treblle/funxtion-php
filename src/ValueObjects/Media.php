<?php

declare(strict_types=1);

namespace Funxtion\ValueObjects;

use DateTimeImmutable;
use Exception;
use Funxtion\Enums\Mime;

final readonly class Media
{
    /**
     * @param string $id
     * @param string $name
     * @param string $url
     * @param Mime $mime
     * @param DateTimeImmutable $createdAt
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $url,
        public Mime $mime,
        public DateTimeImmutable $createdAt,
    ) {
    }

    /**
     * @param array{
     *     id: string,
     *     name: string,
     *     url: string,
     *     mime: string,
     *     created_at: string,
     * } $data
     * @return Media
     * @throws Exception
     */
    public static function fromArray(array $data): Media
    {
        return new Media(
            id: $data['id'],
            name: $data['name'],
            url: $data['url'],
            mime: Mime::from(
                value: $data['mime'],
            ),
            createdAt: new DateTimeImmutable(
                datetime: $data['created_at'],
            ),
        );
    }
}
