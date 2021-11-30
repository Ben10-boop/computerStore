<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersSystem\logoutController;
use App\Http\Controllers\usersSystem\loginController;
use App\Http\Controllers\usersSystem\registerController;
use App\Http\Controllers\usersSystem\homeController;

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
Route::post('/logout', [logoutController::class, 'log_out'])->name('logout');

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/home', [homeController::class, 'index']);

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'log_in']);

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'save']);
