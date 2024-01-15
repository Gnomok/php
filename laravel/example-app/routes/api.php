<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'people'], function () {
    Route::get('/', [PeopleController::class, 'index']);
    Route::get('/{id}', [PeopleController::class, 'show']);
    Route::post('/', [PeopleController::class, 'store']);
    Route::put('/{id}', [PeopleController::class, 'update']);
    Route::delete('/{id}', [PeopleController::class, 'destroy']);
});
