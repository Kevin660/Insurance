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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
});


<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', function (){
    return view('login');
});
Route::get('/register_customer', function (){
    return view('register_customer');
});
Route::get('/register_sales', function (){
    return view('register_sales');
});
=======
>>>>>>> remotes/origin/kevin
