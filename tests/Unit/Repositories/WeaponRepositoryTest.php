<?php

declare(strict_types=1);

namespace Tests\Unit\Repositories;

use App\Repositories\WeaponRepository;
use App\Sources\WeaponSource;
use Mockery\MockInterface;
use Tests\TestCase;

class WeaponRepositoryTest extends TestCase
{
    private WeaponSource | MockInterface $source;
    private WeaponRepository $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->source = $this->mock(WeaponSource::class);
        $this->repository = new WeaponRepository($this->source);
    }

    public function testIndex(): void
    {
        $expected = [
            (object) [
                'id' => '1',
                'name' => 'Buster Sword I',
                'type' => 'great-sword',
                'rarity' => '1'
            ]
        ];

        $this->source
            ->shouldReceive('index')
            ->with('en')
            ->times(1)
            ->andReturn($expected);

        $actual = $this->repository->index('en');

        self::assertSame($expected, $actual);
    }
}
