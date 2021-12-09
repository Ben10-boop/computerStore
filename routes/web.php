<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\usersSystem\editCreditController;
use App\Http\Controllers\usersSystem\editAddressController;
use App\Http\Controllers\usersSystem\blockUserController;
use App\Http\Controllers\usersSystem\addWorkerController;
use App\Http\Controllers\usersSystem\editUserController;
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
Route::get('/blockUser', [blockUserController::class, 'index'])->name('blockUser');
Route::post('/blockUser', [blockUserController::class, 'save_changes']);

Route::get('/addWorker', [addWorkerController::class, 'index'])->name('addWorker');
Route::post('/addWorker', [addWorkerController::class, 'save']);

Route::get('/editCredit', [editCreditController::class, 'index'])->name('editCredit');
Route::post('/editCredit', [editCreditController::class, 'save']);
Route::delete('/editCredit', [editCreditController::class, 'delete']);

Route::get('/editAddress', [editAddressController::class, 'index'])->name('editAddress');
Route::post('/editAddress', [editAddressController::class, 'save']);
Route::delete('/editAddress', [editAddressController::class, 'delete']);

Route::get('/editUser', [editUserController::class, 'index'])->name('editUser');
Route::post('/editUser', [editUserController::class, 'save_changes']);

Route::post('/logout', [logoutController::class, 'log_out'])->name('logout');

Route::get('/', [homeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'log_in']);

Route::get('/verifyEmail', function () {
    return view('usersSystem.verifyEmail');
})->middleware('auth')->name('verification.notice');

Route::get('/verifyEmail/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home')->with('status', 'Elektroninio pašto adresas patvirtintas sėkmingai!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/verifyEmail/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Laiškas išsiūstas!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'save']);
