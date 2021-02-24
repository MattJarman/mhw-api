<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\MonsterController;
use App\Repositories\MonsterRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Mockery\MockInterface;
use Tests\TestCase;

class MonsterControllerTest extends TestCase
{
    private MonsterRepository | MockInterface $monsterRepository;
    private MonsterController $controller;

    public function setUp(): void
    {
        parent::setUp();

        $this->monsterRepository = $this->mock(MonsterRepository::class);
        $this->controller = new MonsterController($this->monsterRepository);
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

        $this->monsterRepository
            ->shouldReceive('index')
            ->with(App::getLocale())
            ->times(1)
            ->andReturn($expected);

        $actual = $this->controller->index();

        self::assertEquals(new JsonResponse($expected), $actual);
    }
}
