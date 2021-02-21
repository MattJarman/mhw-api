<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public function monster(Request $request): BinaryFileResponse
    {
        $id = $request->route('id');
        $path = config('image.folders.monsters') . "$id.png";
        $headers = ['Content-type' => 'image/png'];

        return response()->file($path, $headers);
    }
}
