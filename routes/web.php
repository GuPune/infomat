<?php

use App\Http\Controllers\CustomAuthController;
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

Route::get('admin/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('admin/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('/logout', [CustomAuthController::class, 'perform'])->name('logout.perform');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

});
