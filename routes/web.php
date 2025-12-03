<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion'); 
Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic'); 
Route::get('/community', [CommunityController::class, 'index'])->name('community');

Route::resource('ingredients', IngredientController::class);
Route::resource('foods', FoodController::class);

