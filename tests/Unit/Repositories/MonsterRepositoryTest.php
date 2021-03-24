<?php

declare(strict_types=1);

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
                'id' => '31',
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

        self::assertSame($expected, $actual);
    }

    public function testShow(): void
    {
        $details = (object) [
            'id' => '31',
            'name' => 'Rathalos',
            'size' => 'large',
            'description' => 'The apex monster of the Ancient Forest, also known as the \'King of the Skies.\'
            A terrible wyvern that descends upon invaders, attacking with poison claws and fiery breath.',
            'ecology' => 'Flying Wyvern',
            'colour' => 'Red',
        ];

        $habitats = [
            (object) [
                'name' => 'Ancient Forest',
                'start_area' => 1,
                'move_area' => '1,2,3,4,5',
                'rest_area' => '5',
            ],
        ];

        $rewards = [
            (object) [
                'id' => '1',
                'name' => 'Rathalos Scale',
                'rank' => 'LR',
            ],
        ];

        $breaks = [
            (object) [
                'name' => 'Head',
                'flinch' => '240',
            ],
        ];

        $hitZones = [
            (object) [
                'name' => 'Head',
                'cut' => '65',
                'impact' => '70',
            ],
        ];

        $this->source
            ->shouldReceive('getDetails')
            ->with(31, 'en')
            ->times(1)
            ->andReturn($details);

        $this->source
            ->shouldReceive('getHabitats')
            ->with(31, 'en')
            ->times(1)
            ->andReturn($habitats);

        $this->source
            ->shouldReceive('getRewards')
            ->with(31, 'en')
            ->times(1)
            ->andReturn($rewards);

        $this->source
            ->shouldReceive('getBreaks')
            ->with(31, 'en')
            ->times(1)
            ->andReturn($breaks);

        $this->source
            ->shouldReceive('getHitZones')
            ->with(31, 'en')
            ->times(1)
            ->andReturn($hitZones);

        $expected = [
            'details' => $details,
            'habitats' => $habitats,
            'rewards' => $rewards,
            'breaks' => $breaks,
            'hitZones' => $hitZones,
        ];

        $actual = $this->repository->show(31, 'en');
        self::assertSame($expected, $actual);
    }
}
