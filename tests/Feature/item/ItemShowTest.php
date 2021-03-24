<?php

declare(strict_types=1);

namespace Tests\Feature\item;

use JsonException;
use Tests\TestCase;

use function file_get_contents;
use function json_decode;

use const JSON_THROW_ON_ERROR;

class ItemShowTest extends TestCase
{
    public function testGetItemShowValidationFails(): void
    {
        $response = $this->get('/api/item/-1', ['Accept' => 'application/json']);

        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'item' => ['The selected item is invalid.'],
            ],
        ];

        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @throws JsonException
     */
    public function testItemShow(): void
    {
        $expected = json_decode(file_get_contents(__DIR__ . '/responses/4-en.json'), true, 512, JSON_THROW_ON_ERROR);
        $response = $this->get('/api/item/4', ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @throws JsonException
     */
    public function testItemShowWithLanguage(): void
    {
        $expected = json_decode(file_get_contents(__DIR__ . '/responses/4-ja.json'), true, 512, JSON_THROW_ON_ERROR);
        $response = $this->get('/api/item/4?language=ja', ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }
}
