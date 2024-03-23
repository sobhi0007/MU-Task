<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    // Auth::logout();
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
});

Route::redirect('/', '/home');

Route::get('/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');

Route::get('/auth/{social}', [SocialLoginController::class, 'redirectToSocial'])->name('auth.social');
Route::get('/auth/{social}/callback', [SocialLoginController::class, 'handleSocialCallback']);
