<?php

use App\Http\Controllers\Api\Backoffice\ClubController;
use App\Http\Controllers\Api\Backoffice\CourtController;
use App\Http\Controllers\Api\Backoffice\ReserveController;
use App\Http\Controllers\Api\AuthController;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum', ],function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('profile', [AuthController::class, 'profile']);

        Route::group(
            [
                'prefix'     => 'backoffice',
                'namespace'  => 'Api\Backoffice',
            ],function () {
                Route::apiResource('club', 'ClubController');
                Route::apiResource('court', 'CourtController');
                Route::apiResource('reserve', 'ReserveController');
            }
        );
    }
);


