<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('login', [AdminController::class, 'login'])->name('login');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'auth.is-admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/users/{user}', [AdminController::class, 'show'])->name('show');
});
