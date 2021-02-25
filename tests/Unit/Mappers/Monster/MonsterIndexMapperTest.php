<?php

namespace Tests\Unit\Mappers\Monster;

use App\Mappers\Monster\MonsterIndexMapper;
use Tests\TestCase;

class MonsterIndexMapperTest extends TestCase
{
    private const MONSTER = [
        'id' => 1,
        'name' => 'Aptonoth',
        'size' => 'small',
        'ecology' => null,
    ];

    public function testMapperReturnsCorrectResult(): void
    {
        $monsters = [(object)self::MONSTER];
        $expected = [
            [
                'id' => self::MONSTER['id'],
                'name' => self::MONSTER['name'],
                'size' => self::MONSTER['size'],
                'species' => self::MONSTER['ecology'],
                'url' => 'http://localhost/api/monster/' . self::MONSTER['id'],
            ],
        ];

        $actual = (new MonsterIndexMapper($monsters))->get();

        self::assertEquals($expected, $actual);
    }
}