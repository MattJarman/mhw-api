<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('image')->group(static function () {
    Route::get('/monster/{id}', [ImageController::class, 'monster'])->name('image.monster');
    Route::get('/equipment/{name}', [ImageController::class, 'equipment'])->name('image.equipment');
});
