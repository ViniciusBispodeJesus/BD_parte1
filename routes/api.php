<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/usuarios', [UserController::class, 'listar']);
Route::post('/usuarios', [UserController::class, 'adicionar']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
