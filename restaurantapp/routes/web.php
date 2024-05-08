<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/management', function () {
    return view('management.index');
})->middleware('auth');

Route::get('/cashier', function () {
    return view('cashier.index');
})->middleware('auth');

Route::get('/cashier/getTable', 'App\Http\Controllers\Cashier\CashierController@getTables');

Route::resource('/management/category', 'App\Http\Controllers\Management\CategoryController')->middleware('auth');

Route::resource('/management/menu', 'App\Http\Controllers\Management\MenuController')->middleware('auth');

Route::resource('/management/table', 'App\Http\Controllers\Management\TableController')->middleware('auth');
