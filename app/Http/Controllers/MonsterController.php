<?php

namespace App\Http\Controllers;

use App\Mappers\Monster\MonsterIndexMapper;
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

    public function show(): JsonResponse
    {
        return new JsonResponse();
    }
}
