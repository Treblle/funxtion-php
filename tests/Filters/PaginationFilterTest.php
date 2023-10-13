<?php

declare(strict_types=1);

namespace Tests\Filters;

use Funxtion\Filters\Filter;
use Funxtion\Filters\PaginationFilter;
use Tests\PackageTestCase;

final class PaginationFilterTest extends PackageTestCase
{
    /** @test */
    public function it_can_build_a_pagination_query_parameter(): void
    {
        $filter = new PaginationFilter(
            limit: 100,
        );

        $this->assertInstanceOf(
            expected: Filter::class,
            actual: $filter,
        );

        $this->assertIsString(
            actual: $filter->toQueryParameter(),
        );

        $this->assertEquals(
            expected: "filter[limit]=100",
            actual: $filter->toQueryParameter(),
        );
    }

    /** @test */
    public function it_can_add_an_offset(): void
    {
        $filter = new PaginationFilter(
            limit: 100,
            offset: 10,
        );

        $this->assertEquals(
            expected: "filter[limit]=100&filter[offset]=10",
            actual: $filter->toQueryParameter(),
        );
    }
}
