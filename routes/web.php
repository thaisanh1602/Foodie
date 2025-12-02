<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion'); 
Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic'); 


