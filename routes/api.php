<?php

use App\Http\Controllers\Api\CultureController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\FoodRestaurantController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\TestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get( '/testing', [TestingController::class, 'index']);

// Food 
Route::get('/food', [FoodController::class, 'index']);
Route::get('/food/{id}', [FoodController::class, 'show']);
Route::post('/food', [FoodController::class, 'store']);
Route::delete('/food/{id}', [FoodController::class, 'destroy']);
Route::patch('/food/{id}', [FoodController::class, 'update']);

// FoodRestaurant 
Route::get('/foodRestaurant', [FoodRestaurantController::class, 'index']); 

// Restaurant 
Route::get('/restaurant', [RestaurantController::class, 'index']);
Route::get('/restaurant/{id}', [RestaurantController::class, 'show']);
Route::post('/restaurant', [RestaurantController::class, 'store']);
Route::delete('/restaurant/{id}', [RestaurantController::class, 'destroy']);
Route::patch('/restaurant/{id}', [RestaurantController::class, 'update']);

// Culture  
Route::get('/culture', [CultureController::class, 'index']);
Route::get('/culture/{id}', [CultureController::class, 'show']);
Route::post('/culture', [CultureController::class, 'store']);
Route::delete('/culture/{id}', [CultureController::class, 'destroy']);
Route::patch('/culture/{id}', [CultureController::class, 'update']);

// Village
Route::get('/village', [VillageController::class, 'index']);
Route::get('/village/{id}', [VillageController::class, 'show']);
Route::post('/village', [VillageController::class, 'store']);
Route::delete('/village/{id}', [VillageController::class, 'destroy']);
Route::patch('/village/{id}', [VillageController::class, 'update']);