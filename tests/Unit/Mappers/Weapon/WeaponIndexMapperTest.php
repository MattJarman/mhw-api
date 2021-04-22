<?php

declare(strict_types=1);

namespace Tests\Unit\Mappers\Weapon;

use App\Mappers\Weapon\WeaponIndexMapper;
use Tests\TestCase;

class WeaponIndexMapperTest extends TestCase
{
    private const WEAPON = [
        'id' => '1',
        'name' => 'Buster Sword I',
        'type' => 'great-sword',
        'rarity' => '1',
    ];

    public function testMapperReturnsCorrectResult(): void
    {
        $weapons = [(object) self::WEAPON];
        $expected = [
            [
                'id' => (int) self::WEAPON['id'],
                'name' => self::WEAPON['name'],
                'type' => self::WEAPON['type'],
                'rarity' => (int) self::WEAPON['rarity'],
                'url' => config('app.url') . '/api/weapon/' . self::WEAPON['id'],
            ],
        ];

        $actual = (new WeaponIndexMapper($weapons))->get();

        self::assertSame($expected, $actual);
    }
}
