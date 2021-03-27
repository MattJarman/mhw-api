<?php

declare(strict_types=1);

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\WeaponController;
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

Route::resource('monster', MonsterController::class)->only(['index', 'show'])->middleware('setLocale');
Route::resource('item', ItemController::class)->only(['index', 'show'])->middleware('setLocale');
Route::resource('weapon', WeaponController::class)->only(['index', 'show'])->middleware('setLocale');
