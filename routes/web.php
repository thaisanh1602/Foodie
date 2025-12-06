<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion');
// Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic');
Route::get('/community', [CommunityController::class, 'index'])->name('community');

Route::resource('ingredients', IngredientController::class);
// Route::resource('foods', FoodController::class);


Auth::routes();
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Lưu món ăn
// Danh sách nguyên liệu & form
Route::get('/foods/suggest', [FoodController::class, 'index'])->name('foods.index');

// Gửi nguyên liệu để gợi ý món ăn
Route::post('/foods/suggest', [FoodController::class, 'suggestByIngredients'])->name('foods.suggest');


//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
