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
    return redirect('/dashboard');
});

Auth::routes();

// auth routes dashboard
Route::get('/dashboard', 'HomeController@index')->Middleware('auth');;
Auth::routes(['reset' => false]);

Auth::routes();


// usuarios routes
Route::resource('usuarios', 'UsuariosController')->Middleware('auth');;
Route::get('/boliplayuser', [UsuariosController::class, 'index']);

// guest routes
Route::resource('guest', 'GuestController')->Middleware('auth');;
Route::delete('/guests/{id}', 'GuestController@destroy')->name('guests.destroy');



// hdcashier routes
Route::resource('hdcashier', 'HdcashierController')->Middleware('auth');;
Route::delete('/hdcashiers/{id}', 'HdcashierController@destroy')->name('hdcashiers.destroy');
