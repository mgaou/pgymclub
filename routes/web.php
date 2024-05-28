<?php

use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PratiqueController;
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
    Route::get('/exemple', [HomeController::class, 'exemple'])->name('exemple');
    Route::resource('category', CategoryController::class)->except('delete');
    route::resource('division',DivisionController::class)->except('show','delete');
	  Route::resource('club',ClubController::class)->except('delete');
    Route::resource('profession',ProfessionController::class)->except('show','delete');
    Route::resource('member',MemberController::class)->except('delete');
    route::resource('adhesion',AdhesionController::class)->except('delete');
    route::resource('cotisation',CotisationController::class);
    route::resource('pratique',PratiqueController::class);
  });