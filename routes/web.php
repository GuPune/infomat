<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocalizationController;


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

    Route::resource('new', '\App\Http\Controllers\NewController');
    Route::resource('activity', '\App\Http\Controllers\ActivityController');
    Route::resource('video', '\App\Http\Controllers\VideoController');
    Route::resource('product', '\App\Http\Controllers\ProductWebController');
    Route::resource('banner', '\App\Http\Controllers\BannerController');
    Route::post('/product/uploadimage', [App\Http\Controllers\ProductController::class, 'upload']);

Route::PATCH('sequence/up', [App\Http\Controllers\SequenceController::class, 'up']);
Route::PATCH('sequence/down', [App\Http\Controllers\SequenceController::class, 'down']);
});



Route::get('/new', [NewController::class, 'new'])->name('new');
Route::get('/activity', [ActivityController::class, 'activity'])->name('activity');
Route::get('/activity/{id}', [ActivityController::class, 'oneshow'])->name('activity.oneshow');
Route::get('/video', [VideoController::class, 'video'])->name('video');
Route::get('/product', [ProductWebController::class, 'product'])->name('product');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'save'])->name('contactsave');
Route::get('/change/{lang}', [LocalizationController::class, 'lang_change'])->name('LangChange');
Route::post('uploadx', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('uploadx');

