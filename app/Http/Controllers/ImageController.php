<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public function monster(Request $request): BinaryFileResponse
    {
        $id = $request->route('id');
        $path = config('image.folders.monsters') . "$id.png";

        if (!file_exists($path)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return response()->file($path, ['Content-type' => 'image/png']);
    }
}
