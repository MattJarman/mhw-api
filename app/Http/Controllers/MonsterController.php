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

    /**
     * @group Monster
     * @queryParam language string The language for names and descriptions. Defaults to 'en'.
     * @responseFile storage/responses/monster/index.json
     */
    public function index(): JsonResponse
    {
        $index = $this->monsterRepository->index(App::getLocale());
        $response = (new MonsterIndexMapper($index))->get();

        return new JsonResponse($response);
    }

    /**
     * @param MonsterShowRequest $request
     *
     * @group Monster
     * @urlParam monster integer required The ID of the monster.
     * @queryParam language string The language for names and descriptions. Defaults to 'en'.
     * @responseFile storage/responses/monster/show.json
     */
    public function show(MonsterShowRequest $request): JsonResponse
    {
        $monster = $this->monsterRepository->show((int) $request->route('monster'), App::getLocale());
        $response = (new MonsterShowMapper($monster))->get();

        return new JsonResponse($response);
    }
}
