<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MonsterShowRequest;
use App\Mappers\Monster\MonsterIndexMapper;
use App\Mappers\Monster\MonsterShowMapper;
use App\Repositories\MonsterRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;

class MonsterController extends Controller
{
    private MonsterRepository $monsterRepository;

    public function __construct(MonsterRepository $monsterRepository)
    {
        $this->monsterRepository = $monsterRepository;
    }

    public function index(): JsonResponse
    {
        $index = $this->monsterRepository->index(App::getLocale());
        $response = (new MonsterIndexMapper($index))->get();

        return new JsonResponse($response);
    }

    public function show(MonsterShowRequest $request): JsonResponse
    {
        $monster = $this->monsterRepository->show((int) $request->route('monster'), App::getLocale());
        $response = (new MonsterShowMapper($monster))->get();

        return new JsonResponse($response);
    }
}
