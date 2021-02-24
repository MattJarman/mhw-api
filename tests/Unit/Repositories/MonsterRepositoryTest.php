<?php

namespace Tests\Unit\Repositories;

use App\Repositories\MonsterRepository;
use App\Sources\MonsterSource;
use Mockery\MockInterface;
use Tests\TestCase;

class MonsterRepositoryTest extends TestCase
{
    private MonsterSource | MockInterface $source;
    private MonsterRepository $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->source = $this->mock(MonsterSource::class);
        $this->repository = new MonsterRepository($this->source);
    }

    public function testIndex(): void
    {
        $expected = [
            [
                'id' => 31,
                'name' => 'Rathalos',
                'size' => 'large',
                'ecology' => 'Flying Wyvern',
            ],
        ];

        $this->source
            ->shouldReceive('index')
            ->with('en')
            ->times(1)
            ->andReturn($expected);

        $actual = $this->repository->index('en');

        self::assertEquals($expected, $actual);
    }
}
