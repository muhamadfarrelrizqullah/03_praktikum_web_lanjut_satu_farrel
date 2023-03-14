<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/news/{judul}', function ($judul) {
    return view('news', ['judul' => $judul]);
});

Route::prefix('product')->group(function () {
    Route::get('/shoes', function () {
        return view('product');
    });
});

Route::prefix('program')->group(function () {
    Route::get('/magang', function () {
        return view('program');
    });
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::resource('contact-us', ContactUsController::class)->only([
    'index'
]);
