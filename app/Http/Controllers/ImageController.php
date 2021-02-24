<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentShowRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public const DEFAULT_RARITY = 1;

    public function monster(Request $request): BinaryFileResponse
    {
        $id = $request->route('id');
        $path = config('image.folders.monsters') . "$id.png";

        if (!file_exists($path)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return response()->file($path, ['Content-type' => 'image/png']);
    }

    public function equipment(EquipmentShowRequest $request): BinaryFileResponse
    {
        $equipment = $request->route('name');
        $rarity = $request->get('rarity') ?? self::DEFAULT_RARITY;
        $path = config('image.folders.equipment') . "$equipment/$rarity.png";

        if (!file_exists($path)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return response()->file($path, ['Content-type' => 'image/png']);
    }
}
