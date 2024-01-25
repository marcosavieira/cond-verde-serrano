<?php

use App\Http\Controllers\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Rota para listar todos os leads no db
Route::get('/lead', [LeadController::class, 'index']);

//Rota para gravar um novo lead de usuario
Route::post('/lead', [LeadController::class, 'store']);
