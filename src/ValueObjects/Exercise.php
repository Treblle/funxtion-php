<?php

declare(strict_types=1);

namespace Funxtion\ValueObjects;

use Exception;
use Funxtion\Enums\Gender;
use Funxtion\Enums\Level;
use Funxtion\Enums\Orientation;

final readonly class Exercise
{
    /**
     * @param string $id
     * @param string $name
     * @param string $slug
     * @param Level $level
     * @param Gender $gender
     * @param Orientation $orientation
     * @param array<int,int> $muscleGroups
     * @param array<int,int> $equipment
     * @param array<int,int> $types
     * @param Media $video
     * @param Media $gif
     * @param Media $image
     * @param array<int,string> $steps
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $slug,
        public Level $level,
        public Gender $gender,
        public Orientation $orientation,
        public array $muscleGroups,
        public array $equipment,
        public array $types,
        public Media $video,
        public Media $gif,
        public Media $image,
        public array $steps,
    ) {
    }

    /**
     * @param array{
     *     id: string,
     *     name: string,
     *     slug: string,
     *     level: string,
     *     gender: string,
     *     orientation: string,
     *     muscle_groups: array<int,int>,
     *     equipment: array<int,int>,
     *     types: array<int,int>,
     *     video: array{
     *         id: string,
     *          name: string,
     *          url: string,
     *          mime: string,
     *          created_at: string,
     *     },
     *     gif: array{
     *         id: string,
     *          name: string,
     *          url: string,
     *          mime: string,
     *          created_at: string,
     *     },
     *     image: array{
     *         id: string,
     *         name: string,
     *         url: string,
     *         mime: string,
     *         created_at: string,
     *     },
     *     steps: array<int,string>,
     * } $data
     * @return Exercise
     * @throws Exception
     */
    public static function fromArray(array $data): Exercise
    {
        return new Exercise(
            id: $data['id'],
            name: $data['name'],
            slug: $data['slug'],
            level: Level::from(
                value: $data['level'],
            ),
            gender: Gender::from(
                value: $data['gender'],
            ),
            orientation: Orientation::from(
                value: $data['orientation'],
            ),
            muscleGroups: $data['muscle_groups'],
            equipment: $data['equipment'],
            types: $data['types'],
            video: Media::fromArray(
                data: $data['video'],
            ),
            gif: Media::fromArray(
                data: $data['gif'],
            ),
            image: Media::fromArray(
                data: $data['image'],
            ),
            steps: $data['steps'],
        );
    }
}
