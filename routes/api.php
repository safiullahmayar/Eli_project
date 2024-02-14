<?php

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginRegisterController::class, 'login']);

Route::post('/register', [LoginRegisterController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    // Route::get('/index', [LoginRegisterController::class, 'index']);
    Route::get('/user/edit/{id}', [LoginRegisterController::class, 'edit']);

    Route::post('/user/update/{id}', [LoginRegisterController::class, 'update']);
// Task routes 
Route::post('/task/create', [TasksController::class, 'create_api']);
Route::post('/task/update/{id}', [TasksController::class, 'update_api']);
Route::post('/task/delete/{id}', [TasksController::class, 'delete_api']);




});


