<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;

//Rota para listar todos os leads no db
Route::get('/lead', [LeadController::class, 'index']);

//Rota para gravar um novo lead de usuario
Route::post('/lead', [LeadController::class, 'store']);

//Rota para atualizar um lead de usuario
Route::put('/lead/{id}', [LeadController::class, 'update']);

//Rota para deletar um lead de usuario
Route::delete('/lead/{id}', [LeadController::class, 'destroy']);

//Rota para listar a galeria de imagens
Route::get('/images', [ImagesController::class, 'getImages']);
