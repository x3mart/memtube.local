<?php

use App\Http\Controllers\etThumbnails;
use App\Http\Livewire\AdminVideoEdit;
use App\Http\Livewire\Main;
use App\Http\Livewire\SingleVideo;
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

Auth::routes();

Route::get('/', Main::class, '__invoke')->name('home');
Route::get('/videos/{slug}', SingleVideo::class, '__invoke')->name('video');
Route::get('/admin', AdminVideoEdit::class, '__invoke')->middleware('auth')->name('admin');
Route::get('/login', Main::class, '__invoke')->name('login');
Route::get('/getthumbnails', etThumbnails::class, '__invoke');

