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
use App\Http\Controllers\usersSystem\productsController;
use App\Http\Controllers\shopSystem\monthlyRevenueController;
use App\Http\Controllers\shopSystem\viewCategoriesController;
use App\Http\Controllers\shopSystem\addCategoryController;
use App\Http\Controllers\ItemSystem\addItemController;
use App\Http\Controllers\ItemSystem\editItemController;
use App\Http\Controllers\ItemSystem\deleteItemController;
use App\Http\Controllers\ItemSystem\previewItemController;
use App\Http\Controllers\shopSystem\editCategoryController;
/*
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
Route::get('/blockUser', [blockUserController::class, 'index'])->name(
    'blockUser'
);
Route::post('/blockUser', [blockUserController::class, 'save_changes']);

Route::get('/addWorker', [addWorkerController::class, 'index'])->name(
    'addWorker'
);
Route::post('/addWorker', [addWorkerController::class, 'save']);

Route::get('/editCredit', [editCreditController::class, 'index'])->name(
    'editCredit'
);
Route::post('/editCredit', [editCreditController::class, 'save']);
Route::delete('/editCredit', [editCreditController::class, 'delete']);

Route::get('/editAddress', [editAddressController::class, 'index'])->name(
    'editAddress'
);
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
})
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verifyEmail/{id}/{hash}', function (
    EmailVerificationRequest $request
) {
    $request->fulfill();

    return redirect()
        ->route('home')
        ->with('status', 'Elektroninio pašto adresas patvirtintas sėkmingai!');
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/verifyEmail/verification-notification', function (
    Request $request
) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Laiškas išsiūstas!');
})
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'save']);

Route::get('/products', [productsController::class, 'index'])->name('products');

Route::get('/monthlyRevenue', [monthlyRevenueController::class, 'index'])->name(
    'monthlyRevenue'
);

Route::get('/categories', [viewCategoriesController::class, 'index'])->name(
    'categories'
);
Route::post('/categories', [viewCategoriesController::class, 'save_changes']);

Route::get('/addCategory', [addCategoryController::class, 'index'])->name(
    'addCategory'
);
Route::post('/addCategory', [addCategoryController::class, 'save']);


Route::get('/addItem', [addItemController::class, 'index'])->name(
    'addItem'
);
Route::post('/addItem', [addItemController::class, 'save']);

Route::get('/deleteItem', [deleteItemController::class, 'index'])->name(
    'deleteItem'
);

Route::post('/deleteItem', [deleteItemController::class, 'save']);

Route::get('/editItem', [editItemController::class, 'index'])->name(
    'editItem'
);
Route::post('/editItem', [editItemController::class, 'save']);

Route::get('/previewItem', [previewItemController::class, 'index'])->name(
    'previewItem'
);
Route::post('/previewItem', [previewItemController::class, 'save']);

Route::get('/editCategory', [editCategoryController::class, 'index'])->name(
    'editCategory'
);

Route::post('/editCategory', [editCategoryController::class, 'save_changes']);
