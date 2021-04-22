<?php

declare(strict_types=1);

namespace Tests\Feature\item;

use Tests\TestCase;

class ItemIndexTest extends TestCase
{
    public function testItemIndex(): void
    {
        $response = $this->get('/api/item');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => 'Potion',
            'category' => 'item',
            'url' => config('app.url') . '/api/item/1',
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }

    public function testItemIndexWithLanguage(): void
    {
        $response = $this->get('/api/item?language=ja');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => '回復薬',
            'category' => 'item',
            'url' => config('app.url') . '/api/item/1',
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }
}
