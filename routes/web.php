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

// HOMEPAGE
Route::get('/', function () {
    return view('welcome');
});


// ROTTE PER LOGIN / REGISTRAZIONE

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/**
 * ROTTE PAGINE PER UTENTI LOGGATI
 */

 Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){
        // Home Admin

        // Rotte Crud Post
    })
