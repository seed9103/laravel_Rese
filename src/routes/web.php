<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailVerificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




 

 

Route::get('/', [RestaurantController::class, 'index']); 
Route::get('/detail/{id}', [RestaurantController::class, 'detail']);
Route::get('/menu', [RestaurantController::class, 'menu']);
Route::post('/reservation', [ReservationController::class,'store']);
Route::get('/reservation_thanks', [ReservationController::class, 'reservation_thanks']); 
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy']);
Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit']);
Route::put('/reservation/{id}', [ReservationController::class, 'update']);
Route::get('/my_page', [UserController::class, 'myPage'])->middleware('auth');
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);
Route::post('/favorite/toggle', [FavoriteController::class, 'toggleFavorite']);
Route::get('/search', [RestaurantController::class, 'search']);
Route::post('/reservation/{reservation}/review', [ReviewController::class, 'store']);
Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');