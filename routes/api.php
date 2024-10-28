<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produto',[ProdutoController::class,'listar']);
Route::post('/produto',[ProdutoController::class,'salvar']);
Route::put('/produto/{id}',[ProdutoController::class,'editar']);
Route::delete('/produto/{id}',[ProdutoController::class,'excluir']);
Route::get('/produto/{id}',[ProdutoController::class,'listarPeloId']); 