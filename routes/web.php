<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrantController;
use App\Http\Controllers\UserController;

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
Route::get('/',[RegisterController::class, 'index']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);

Route::group(['prefix'=> 'admin', 'middleware' => ['auth']], function() {
	Route::get('index', [UserController::class, 'index']);
	Route::get('getShots', [UserController::class, 'show']);
	Route::get('export-user', [UserController::class, 'exportUser']);
	
});

Route::group(['prefix'=> 'dashboard', 'middleware' => ['auth']], function() {
	Route::get('index', [EntrantController::class, 'index']);
	Route::post('store', [EntrantController::class, 'store']);
	Route::get('edit/{id}', [EntrantController::class, 'edit']);
	Route::post('update/{id}', [EntrantController::class, 'update']);
	Route::get('delete/{id}', [EntrantController::class, 'destroy']);
	
});
