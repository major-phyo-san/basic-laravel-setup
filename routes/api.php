<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\ResourceControllers\UserResourceController;
use App\Repositories\User\UserRepository;

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

// admin auth routes
// prefixed with '/admins'
Route::group(['prefix' => 'admins'], function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::post('/login', [AuthController::class, 'login']);
});

// admin API routes
// guarded with admin api guard ('sanctum')
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/users', [UserResourceController::class, 'list']);
    Route::get('/users/{user}', [UserResourceController::class, 'detail']);
    Route::post('/users', [UserResourceController::class, 'create']);
    Route::put('/users/{user}', [UserResourceController::class, 'update']);
    Route::delete('/users/{user}', [UserResourceController::class, 'delete']);
});
