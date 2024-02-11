<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JawabanController;
use Illuminate\Support\Facades\Auth;

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
    return view('layouts.master');
});

Route::middleware(['auth'])->group(function() {
//CRUD Categories
Route::resource('categories', CategoriesController::class);

//Profile
Route::resource('profile',ProfileController::class)->only('index','update');

//jawaban
Route::resource('/jawaban{ $pertanyaan_id}', CategoriesController::class);

});



//CRUD Pertanyaan
Route::resource('pertanyaan', PertanyaanController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
