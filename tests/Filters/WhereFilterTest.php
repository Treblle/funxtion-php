<?php

declare(strict_types=1);

namespace Tests\Filters;

use Funxtion\Enums\Operator;
use Funxtion\Filters\Filter;
use Funxtion\Filters\WhereFilter;
use Tests\PackageTestCase;

final class WhereFilterTest extends PackageTestCase
{
    /** @test */
    public function it_can_build_a_where_query_parameter(): void
    {
        $filter = new WhereFilter(
            key: 'test',
            value: 'something',
            operator: Operator::EQUALS,
        );

        $this->assertInstanceOf(
            expected: Filter::class,
            actual: $filter,
        );

        $this->assertIsString(
            actual: $filter->toQueryParameter(),
        );

        $this->assertEquals(
            expected: "filter[where][test][eq]=something",
            actual: $filter->toQueryParameter(),
        );
    }
}
