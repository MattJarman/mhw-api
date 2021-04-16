<?php

declare(strict_types=1);

namespace Tests\Feature\weapon;

use JsonException;
use Tests\TestCase;

use const JSON_THROW_ON_ERROR;

class WeaponShowTest extends TestCase
{
    public function testGetWeaponShowValidationFails(): void
    {
        $response = $this->get('/api/weapon/-1', ['Accept' => 'application/json']);

        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'weapon' => ['The selected weapon is invalid.'],
            ],
        ];

        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @param int $id
     *
     * @throws JsonException
     *
     * @dataProvider weaponShowDataProvider
     */
    public function testWeaponShow(int $id): void
    {
        $expected = json_decode(
            file_get_contents(__DIR__ . '/responses/' . $id . '-en.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $response = $this->get('/api/weapon/' . $id, ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @throws JsonException
     */
    public function testWeaponShowWithLanguage(): void
    {
        $expected = json_decode(file_get_contents(__DIR__ . '/responses/1-ja.json'), true, 512, JSON_THROW_ON_ERROR);
        $response = $this->get('/api/weapon/1?language=ja', ['Accept' => 'application/json']);

        $response->assertOk();
        self::assertSame($expected, $response->getOriginalContent());
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function weaponShowDataProvider(): array
    {
        return [
            'Great Sword' => ['id' => 1],
            'Hunting Horn' => ['id' => 429],
            'Gunlance' => ['id' => 598],
            'Charge Blade' => ['id' => 756],
            'Insect Glaive' => ['id' => 831],
            'Bow' => ['id' => 1075],
            'Light Bowgun' => ['id' => 912],
        ];
    }
}
