<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/users', [UserController::class, 'createUser']);
Route::get('/users', [UserController::class, 'getUsers']);


Route::middleware('jwt.auth')->group(function () {
    Route::get('/todos', [TodoController::class, 'getTodoByUser']);
    Route::post('/todos', [TodoController::class, 'postTodo']);
    Route::put('/todos', [TodoController::class, 'updateTodo']);
    Route::delete('/todos/{id}', [TodoController::class, 'deleteTodo']);
    
});
