<?php

declare(strict_types=1);

namespace Tests\Unit\Repositories;

use App\Repositories\ItemRepository;
use App\Sources\ItemSource;
use Mockery\MockInterface;
use Tests\TestCase;

class ItemRepositoryTest extends TestCase
{
    private ItemSource | MockInterface $source;
    private ItemRepository $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->source = $this->mock(ItemSource::class);
        $this->repository = new ItemRepository($this->source);
    }

    public function testIndex(): void
    {
        $expected = [
            (object) [
                'id' => '1',
                'name' => 'Potion',
                'category' => 'item',
                'url' => 'http://localhost:8989/api/item/1',
            ],
        ];

        $this->source
            ->shouldReceive('index')
            ->with('en')
            ->times(1)
            ->andReturn($expected);

        $actual = $this->repository->index('en');

        self::assertSame($expected, $actual);
    }

    public function testShow(): void
    {
        $details = (object) [
            'id' => '1',
            'name' => 'Potion',
            'icon_name' => 'Liquid',
            'icon_color' => 'Green',
            'category' => 'item',
            'subcategory' => 'sub-item',
            'rarity' => '1',
            'buy_price' => '66',
            'sell_price' => '8',
            'carry_limit' => '10',
            'points' => '0',
        ];

        $recipes = [
            (object) [
                'result' => 'Potion',
                'first_ingredient_id' => '32',
                'first_ingredient' => 'Herb',
                'second_ingredient_id' => null,
                'second_ingredient' => null,
            ],
        ];

        $this->source
            ->shouldReceive('getDetails')
            ->with(1, 'en')
            ->times(1)
            ->andReturn($details);

        $this->source
            ->shouldReceive('getRecipes')
            ->with(1, 'en')
            ->times(1)
            ->andReturn($recipes);

        $expected = [
            'details' => $details,
            'recipes' => $recipes,
        ];

        $actual = $this->repository->show(1, 'en');

        self::assertSame($expected, $actual);
    }
}
