<?php

declare(strict_types=1);

namespace Tests\Unit\Mappers\Item;

use App\Mappers\Item\ItemIndexMapper;
use Tests\TestCase;

class ItemIndexMapperTest extends TestCase
{
    private const ITEM = [
        'id' => '1',
        'name' => 'Potion',
        'category' => 'item',
    ];

    public function testMapperReturnsCorrectResult(): void
    {
        $items = [(object) self::ITEM];
        $expected = [
            [
                'id' => 1,
                'name' => 'Potion',
                'category' => 'item',
                'url' => 'http://localhost/api/item/' . self::ITEM['id'],
            ],
        ];

        $actual = (new ItemIndexMapper($items))->get();

        self::assertEquals($expected, $actual);
    }
}
