<?php

use App\Http\Controllers\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;

//Rota para listar todos os leads no db
Route::get('/lead', [LeadController::class, 'index']);

//Rota para gravar um novo lead de usuario
Route::post('/lead', [LeadController::class, 'store']);

//Rota para listar a galeria de imagens
Route::get('/images', [ImagesController::class, 'getImages']);
