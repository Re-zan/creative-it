<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseleedController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HeaderController;
use App\Http\Controllers\Backend\LeedController;
use App\Http\Controllers\Backend\MenuController;
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

//header routes
Route::resource('header', HeaderController::class);
//menu route
Route::resource('menu', MenuController::class);

//banner route 
Route::GET('banner_status/{id}', [BannerController::class, 'status'])->name('banner.status');
Route::GET('trash/banner', [BannerController::class, 'trash'])->name('banner.trash');
Route::DELETE('delete/banner/{id}', [BannerController::class, 'parmanentdelete'])->name('banner.delete');
Route::GET('restore/banner/{id}', [BannerController::class, 'restore'])->name('banner.restore');
Route::resource('banner', BannerController::class);

//About Routes
ROute::GET('about_status/{id}', [AboutController::class, 'status'])->name('about_status');
Route::resource('about', AboutController::class);

//semina routes
Route::GET('seminar/join', [SeminarController::class, 'join'])->name('seminar/join');
Route::resource('seminar', SeminarController::class);
Route::resource('seminar/leed', LeedController::class);

//course routes
Route::GET('course/topics', [CourseController::class, 'coursede'])->name('course_topic');
Route::resource('course', CourseController::class);
Route::resource('course/courseleeds', CourseleedController::class);

//gallery Routes
Route::GET('galler_status/{id}',[GalleryController::class, 'status'])->name('gallery_status');
Route::resource('gallery', GalleryController::class);

//footer route
Route::resource('footer', FooterController::class);

