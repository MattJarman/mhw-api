<?php

namespace Tests\Feature\monster;

use Tests\TestCase;

class MonsterShowTest extends TestCase
{
    public function testMonsterShowValidationFails(): void
    {
        $response = $this->get('/api/monster/-1', ['Accept' => 'application/json']);

        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'monster' => [
                    'The selected monster is invalid.'
                ]
            ]
        ];

        self::assertEquals($expected, $response->getOriginalContent());
    }
}
