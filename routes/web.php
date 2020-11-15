<?php

use App\Http\Livewire\AdminVideoEdit;
use App\Http\Livewire\Main;
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

Route::get('/', Main::class, '__invoke')->name('home');
Route::get('/admin', AdminVideoEdit::class, '__invoke')->middleware('auth')->name('admin');

