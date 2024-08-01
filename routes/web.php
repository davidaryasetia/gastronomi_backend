<?php

use App\Http\Controllers\BackendController\CultureController;
use App\Http\Controllers\BackendController\FoodController;
use App\Http\Controllers\BackendController\RestaurantController;
use App\Http\Controllers\BackendController\VillageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sections.dashboard.dashboard', [
        'title' => 'Dashboard', 
    ]);
});

Route::resource('/food', FoodController::class);
Route::resource('/restaurant', RestaurantController::class);
Route::resource('/village', VillageController::class);
Route::resource('/culture', CultureController::class);

Route::get('/food-suggestion', [FoodController::class, 'suggestion']);
