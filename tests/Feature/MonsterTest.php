<?php

namespace Tests\Feature;

use Tests\TestCase;

class MonsterTest extends TestCase
{
    public function testMonsterIndex(): void
    {
        $response = $this->get('/api/monster');

        $response->assertOk();
        $response->assertHeader('Content-type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => 'Aptonoth',
            'size' => 'small',
            'species' => null,
            'url' => 'http:/localhost:8989/api/monster/1'
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }

    public function testMonsterIndexWithLanguage(): void
    {
        $response = $this->get('/api/monster?language=ja');

        $response->assertOk();
        $response->assertHeader('Content-type', 'application/json');

        $expected = [
            'id' => 1,
            'name' => 'アプトノス',
            'size' => 'small',
            'species' => null,
            'url' => 'http:/localhost:8989/api/monster/1'
        ];

        self::assertNotEmpty($response->getOriginalContent());
        self::assertContains($expected, $response->getOriginalContent());
    }
}
