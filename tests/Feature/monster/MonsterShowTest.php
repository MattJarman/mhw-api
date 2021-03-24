<?php

declare(strict_types=1);

namespace Tests\Feature\monster;

use JsonException;
use Tests\TestCase;

use function file_get_contents;
use function json_decode;

use const JSON_THROW_ON_ERROR;

class MonsterShowTest extends TestCase
{
    public function testMonsterShowValidationFails(): void
    {
        $response = $this->get('/api/monster/-1', ['Accept' => 'application/json']);

        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'monster' => ['The selected monster is invalid.'],
            ],
        ];

        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @throws JsonException
     */
    public function testMonsterShow(): void
    {
        $expected = json_decode(file_get_contents(__DIR__ . '/responses/31-en.json'), true, 512, JSON_THROW_ON_ERROR);
        $response = $this->get('/api/monster/31', ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @throws JsonException
     */
    public function testMonsterShowWithLanguage(): void
    {
        $expected = json_decode(file_get_contents(__DIR__ . '/responses/31-ja.json'), true, 512, JSON_THROW_ON_ERROR);
        $response = $this->get('/api/monster/31?language=ja', ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }
}
