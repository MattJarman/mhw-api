<?php

namespace App\Http\Controllers;

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
        return new JsonResponse($this->monsterRepository->index(App::getLocale()));
    }

    public function show(): JsonResponse
    {
        return new JsonResponse();
    }
}
