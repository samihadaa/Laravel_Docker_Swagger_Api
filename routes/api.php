<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[AuthController::class, 'user']);
    Route::post('logout',[AuthController::class, 'logout']);
    Route::apiResource('usersList',UserController::class);
    Route::get('permissions',[PermissionController::class, 'index']);
    Route::get('roles',[RoleController::class, 'index']);
    Route::get('roles/{role}',[RoleController::class, 'show']);

});
