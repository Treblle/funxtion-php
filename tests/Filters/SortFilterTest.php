<?php

declare(strict_types=1);

namespace Tests\Filters;

use Funxtion\Enums\Direction;
use Funxtion\Filters\Filter;
use Funxtion\Filters\SortFilter;
use Tests\PackageTestCase;

final class SortFilterTest extends PackageTestCase
{
    /** @test */
    public function it_can_build_a_sort_query_parameter(): void
    {
        $filter = new SortFilter(
            key: 'test',
            direction: Direction::DESC,
        );

        $this->assertInstanceOf(
            expected: Filter::class,
            actual: $filter,
        );

        $this->assertIsString(
            actual: $filter->toQueryParameter(),
        );

        $this->assertEquals(
            expected: "filter[order][test]=desc",
            actual: $filter->toQueryParameter(),
        );
    }

    /** @test */
    public function it_can_switch_the_order(): void
    {
        $filter = new SortFilter(
            key: 'test',
            direction: Direction::ASC,
        );

        $this->assertEquals(
            expected: "filter[order][test]=asc",
            actual: $filter->toQueryParameter(),
        );
    }
}
