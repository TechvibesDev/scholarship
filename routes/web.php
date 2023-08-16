<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipController;
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
//     return view('welcome');
// });
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'scholarships'], function () {
        Route::get('/', [ScholarshipController::class, 'index'])->name('scholarships.index');
        Route::get('/create', [ScholarshipController::class, 'create'])->name('scholarships.create');
        Route::post('/store', [ScholarshipController::class, 'store'])->name('scholarships.store');
        Route::get('/details/{id}', [ScholarshipController::class, 'details'])->name('scholarships.details');
        Route::post('/apply', [ScholarshipController::class, 'Apply'])->name('scholarships.Apply');
        Route::get('/applications', [ScholarshipController::class, 'application'])->name('scholarships.applications');
        Route::get('/approved/{id}', [ScholarshipController::class, 'Approved'])->name('scholarships.approved');
    });
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::post('/update', [HomeController::class, 'update'])->name('home.update');
});
