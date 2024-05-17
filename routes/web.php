<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,//confirmation
  ]);



Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/category.index',[CategoryController::class,'index'])->name('category');
    Route::get('/member.index',[MemberController::class,'index'])->name('member');
    Route::get('/club.index',[ClubController::class,'index'])->name('club');
    Route::get('/division.index',[DivisionController::class,'index'])->name('division');
    Route::get('/profession.index',[ProfessionController::class,'index'])->name('profession');
    Route::resource('category', CategoryController::class)->except('delete');
    route::resource('division',DivisionController::class)->except('show','delete');
	Route::resource('club',ClubController::class)->except('delete');
    Route::resource('profession',ProfessionController::class)->except('show','delete');
    Route::resource('member',MemberController::class)->except('delete');
  });