<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RastreamentoController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/rastreamento', RastreamentoController::class)->name('rastreamento');
Route::get('/historico', \App\Http\Controllers\HistoriController::class)->name('historico');
