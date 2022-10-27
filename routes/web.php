<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [MainController::class,'getIndex']);
Route::get('contact', [MainController::class,'getContact']);
Route::get('about', [MainController::class,'getAbout']);
Route::get('why-us', [MainController::class,'getWhyUs']);
Route::get('reservation', function(){
    return redirect()->intended('/');
});
Route::post('reservation', [MainController::class,'postReservation']);


//Authentication
Route::get('login', [LoginController::class,'getLogin']);
Route::get('xx', [LoginController::class,'getSignup']);
Route::post('login', [LoginController::class,'postLogin']);
Route::post('signup', [LoginController::class,'postSignup']);
Route::get('bye', [LoginController::class,'getLogout']);

//Tracking
Route::get('track', [MainController::class,'getTrack']);

//Users
Route::get('dashboard', [MainController::class,'getDashboard']);
Route::get('profile', [MainController::class,'getProfile']);
Route::post('profile', [MainController::class,'postProfile']);
Route::get('bye', [LoginController::class,'getLogout']);

//Portfolios
Route::get('portfolios', [MainController::class,'getPortfolios']);

//Transactions
Route::get('transactions', [MainController::class,'getTransactions']);

Route::get('plugins', [AdminController::class,'getPlugins']);
Route::get('add-plugin', [AdminController::class,'getAddPlugin']);
Route::post('add-plugin', [AdminController::class,'postAddPlugin']);
Route::get('plugin', [AdminController::class,'getPlugin']);
Route::post('plugin', [AdminController::class,'postPlugin']);
Route::get('remove-plugin', [AdminController::class,'getRemovePlugin']);
