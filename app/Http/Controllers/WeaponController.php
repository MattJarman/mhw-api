<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mappers\Weapon\WeaponIndexMapper;
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

    public function show(): JsonResponse
    {
        return new JsonResponse();
    }
}
