<?php

declare(strict_types=1);

namespace Tests\Feature\weapon;

use Tests\TestCase;

class WeaponIndexTest extends TestCase
{
    public function testWeaponIndex(): void
    {
        $response = $this->get('/api/weapon');

        $response->assertOk();
        $response->assertHeader('Content-type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => 'Buster Sword I',
            'type' => 'great-sword',
            'rarity' => 1,
            'url' => 'http://localhost/api/weapon/1',
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }

    public function testWeaponIndexWithLanguage(): void
    {
        $response = $this->get('/api/weapon?language=ja');

        $response->assertOk();
        $response->assertHeader('Content-type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => 'バスターソードⅠ',
            'type' => 'great-sword',
            'rarity' => 1,
            'url' => 'http://localhost/api/weapon/1',
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }
}
