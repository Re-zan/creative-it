<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LeedController;
use App\Http\Controllers\Backend\SeminarController;
use App\Http\Controllers\fronntend\FrontendController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//banner route 
Route::GET('banner_status/{id}', [BannerController::class, 'status'])->name('banner.status');
Route::resource('banner', BannerController::class);

//About Routes
ROute::GET('about_status/{id}', [AboutController::class, 'status'])->name('about_status');
Route::resource('about', AboutController::class);

//semina routes
Route::GET('seminar/join', [SeminarController::class, 'join'])->name('seminar/join');
Route::resource('seminar', SeminarController::class);
Route::resource('seminar/leed', LeedController::class);

//gallery Routes
Route::GET('galler_status/{id}',[GalleryController::class, 'status'])->name('gallery_status');
Route::resource('gallery', GalleryController::class);


