<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeaponShowRequest;
use App\Mappers\Weapon\WeaponIndexMapper;
use App\Mappers\Weapon\WeaponShowMapper;
use App\Repositories\WeaponRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;

class WeaponController extends Controller
{
    private WeaponRepository $weaponRepository;

    public function __construct(WeaponRepository $weaponRepository)
    {
        $this->weaponRepository = $weaponRepository;
    }

    public function index(): JsonResponse
    {
        $index = $this->weaponRepository->index(App::getLocale());
        $response = (new WeaponIndexMapper($index))->get();

        return new JsonResponse($response);
    }

    public function show(WeaponShowRequest $request): JsonResponse
    {
        $weapon = $this->weaponRepository->show((int) $request->route('weapon'), App::getLocale());
        $response = (new WeaponShowMapper($weapon))->get();

        return new JsonResponse($response);
    }
}
