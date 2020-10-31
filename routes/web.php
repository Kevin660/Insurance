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
    
    Route::prefix('questions')->group(function () {  // 需登入
        Route::get('create', 'QuestionController@create');  //   到新增頁面
        Route::post('store', 'QuestionController@store');   //   儲存新增頁面的內容
        Route::get('indexSelf', 'QuestionController@indexSelf'); // with order param
        Route::get('{question}/edit', 'QuestionController@edit'); // 到編輯頁面
        Route::post('{question}', 'QuestionController@update');   // 更新編輯頁面的內容
        Route::delete('{question}', 'QuestionController@destroy'); // 刪除一筆問題

        Route::post('{question}/voteUp', 'QuestionController@voteUp');  // 投票+1
        Route::post('{question}/voteDown', 'QuestionController@voteDown'); // 投票-1
        Route::post('{question}/voteCancel', 'QuestionController@voteCancel'); // 取消投票
        
        Route::post('{question}/answer', 'QuestionController@answer');  // 新增答案
        Route::post('{question}/accept/{{answer}}', 'QuestionController@accept'); // 設為正解
    });
});

Route::prefix('questions')->group(function () {  // 無須登入
    Route::get('index', 'QuestionController@index');  // with order param
    Route::get('{question}', 'QuestionController@show');  // 顯示單筆問題
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

Route::get('/sales/{typeId}', 'UserController@sales');

