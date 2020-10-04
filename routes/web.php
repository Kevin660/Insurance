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
    
    Route::prefix('questions')->group(function () {
        Route::get('create', 'QuestionController@create');
        Route::post('store', 'QuestionController@store');
        Route::get('indexSelf', 'QuestionController@indexSelf'); // with order param
        Route::get('{question}/edit', 'QuestionController@edit');
        Route::post('{question}', 'QuestionController@update');
        Route::delete('{question}', 'QuestionController@destroy');

        Route::post('{question}/voteUp', 'QuestionController@voteUp');
        Route::post('{question}/voteDown', 'QuestionController@voteDown');
        Route::post('{question}/voteCancel', 'QuestionController@voteCancel');
        
        Route::post('{question}/answer', 'QuestionController@answer');
        Route::post('{question}/accept/{{answer}}', 'QuestionController@accept');
    });
    
});
Route::prefix('questions')->group(function () {
    Route::get('index', 'QuestionController@index');  // with order param
    Route::get('{question}', 'QuestionController@show');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', function (){
    return view('login');
})->name("login");

Route::get('/register_customer', function (){
    return view('register_customer');
});

Route::get('/register_sales', function (){
    return view('register_sales');
});
