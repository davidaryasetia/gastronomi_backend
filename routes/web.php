<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\BackendController\CultureController;
use App\Http\Controllers\BackendController\FoodController;
use App\Http\Controllers\BackendController\RestaurantController;
use App\Http\Controllers\BackendController\UserController;
use App\Http\Controllers\BackendController\VillageController;
use App\Http\Controllers\BackendController\VisitorController;
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

// Route::get('/', function () {
//     return view('sections.dashboard.dashboard', [
//         'title' => 'Dashboard', 
//     ]);
// });

Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
// Login Controller
Route::middleware(['guestUser'])->group(function () {
    Route::get('/', [AuthenticateController::class, 'showLoginForm'])->name('formLogin');
    Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::get('secret-registration', [AuthenticateController::class, 'showRegisterForm'])->name('register');
    Route::post('secret-registration', [AuthenticateController::class, 'secret_registration'])->name('secret_registration');
});

// Route Middleware 
Route::middleware(['authUser'])->group(function () {
    Route::get('/home', [VisitorController::class, 'index'])->name('home');
    Route::resource('/food', FoodController::class);
    Route::resource('/restaurant', RestaurantController::class);
    Route::resource('/village', VillageController::class);
    Route::resource('/culture', CultureController::class);
    Route::resource('/daftar-user', UserController::class);

    Route::get('/food-suggestion', [FoodController::class, 'suggestion']);
    Route::post('/visitor', [VisitorController::class, 'store'])->name('visitor.store');
});

