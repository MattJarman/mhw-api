<?php

declare(strict_types=1);

namespace Tests\Unit\Mappers\Item;

use App\Mappers\Item\ItemShowFieldMapper;
use Tests\TestCase;

class ItemShowFieldMapperTest extends TestCase
{
    private const DETAILS = [
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

    private const RECIPE_ONE = [
        'result' => 'Potion',
        'first_ingredient_id' => '32',
        'first_ingredient' => 'Herb',
        'second_ingredient_id' => null,
        'second_ingredient' => null,
    ];

    /** @var array<string, mixed> */
    private array $item;

    private ItemShowFieldMapper $mapper;

    public function setUp(): void
    {
        parent::setUp();

        $this->item = [
            'details' => (object) self::DETAILS,
            'recipes' => [(object) self::RECIPE_ONE],
        ];

        $this->mapper = new ItemShowFieldMapper($this->item);
    }

    public function testGetName(): void
    {
        self::assertSame(self::DETAILS['name'], $this->mapper->getName());
    }

    public function testGetIconUrl(): void
    {
        self::assertSame(url('/images/items/liquid/green.png'), $this->mapper->getIconUrl());
    }

    public function testGetIconUrlReturnsNullIfNoIconNameSet(): void
    {
        $item = $this->item;
        $item['details']->icon_name = null;
        $mapper = new ItemShowFieldMapper($item);
        self::assertNull($mapper->getIconUrl());
    }

    public function testGetCategory(): void
    {
        self::assertSame(self::DETAILS['category'], $this->mapper->getCategory());
    }

    public function testGetSubCategory(): void
    {
        self::assertSame(self::DETAILS['subcategory'], $this->mapper->getSubCategory());
    }

    public function testGetPrices(): void
    {
        $prices = [
            'buy' => (int) self::DETAILS['buy_price'],
            'sell' => (int) self::DETAILS['sell_price'],
        ];

        self::assertSame($prices, $this->mapper->getPrices());
    }

    public function testGetCarryLimit(): void
    {
        self::assertSame((int) self::DETAILS['carry_limit'], $this->mapper->getCarryLimit());
    }

    public function testGetResearchPoints(): void
    {
        self::assertSame((int) self::DETAILS['points'], $this->mapper->getResearchPoints());
    }

    public function testGetRecipesWithOneIngredient(): void
    {
        $recipes = [
            [
                'first_ingredient' => [
                    'name' => self::RECIPE_ONE['first_ingredient'],
                    'url' => route('item.show', self::RECIPE_ONE['first_ingredient_id']),
                ],
                'second_ingredient' => null,
            ],
        ];

        self::assertSame($recipes, $this->mapper->getRecipes());
    }

    public function testGetRecipesWithTwoIngredients(): void
    {
        $recipe = self::RECIPE_ONE;
        $recipe['second_ingredient'] = 'Honey';
        $recipe['second_ingredient_id'] = '31';

        $item = $this->item;
        $item['recipes'] = [(object) $recipe];
        $mapper = new ItemShowFieldMapper($item);

        $recipes = [
            [
                'first_ingredient' => [
                    'name' => $recipe['first_ingredient'],
                    'url' => route('item.show', $recipe['first_ingredient_id']),
                ],
                'second_ingredient' => [
                    'name' => $recipe['second_ingredient'],
                    'url' => route('item.show', $recipe['second_ingredient_id']),
                ],
            ],
        ];

        self::assertSame($recipes, $mapper->getRecipes());
    }
}
