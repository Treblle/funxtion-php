<?php

declare(strict_types=1);

namespace Funxtion\ValueObjects;

use Funxtion\Enums\Gender;
use Funxtion\Enums\Level;
use Funxtion\Enums\Orientation;

final readonly class ExerciseCollectionItem
{
    /**
     * @param string $id
     * @param string $name
     * @param string $slug
     * @param string $summary
     * @param string $video
     * @param string $gif
     * @param string $image
     * @param array<int,int> $types
     * @param Level $level
     * @param Gender $gender
     * @param Orientation $orientation
     * @param array<int,int> $muscleGroups
     * @param array<int,int> $equipment
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $slug,
        public string $summary,
        public string $video,
        public string $gif,
        public string $image,
        public array $types,
        public Level $level,
        public Gender $gender,
        public Orientation $orientation,
        public array $muscleGroups,
        public array $equipment,
    ) {
    }

    /**
     * @param array{
     *     id: string,
     *     name: string,
     *     slug: string,
     *     summary: string,
     *     video: string,
     *     gif: string,
     *     image: string,
     *     types: array<int,int>,
     *     level: string,
     *     gender: string,
     *     orientation: string,
     *     muscle_groups: array<int,int>,
     *     equipment: array<int,int>,
     * } $data
     * @return ExerciseCollectionItem
     */
    public static function fromArray(array $data): ExerciseCollectionItem
    {
        return new ExerciseCollectionItem(
            id: $data['id'],
            name: $data['name'],
            slug: $data['slug'],
            summary: $data['summary'],
            video: $data['video'],
            gif: $data['gif'],
            image: $data['image'],
            types: $data['types'],
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
        );
    }
}
