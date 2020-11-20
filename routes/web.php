<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});
Auth::routes([
    'login' => true,
    'register' => true,
    'reset' => false,
    'verify' => true
]);
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
        Route::post('{question}/accept/{answer}', 'QuestionController@accept'); // 設為正解
    });
    Route::prefix('answers')->group(function () { 
        Route::get('indexSelf', 'AnswerController@indexSelf'); // with order param
        Route::get('{answer}/edit', 'AnswerController@edit'); 
        Route::post('{answer}', 'AnswerController@update');   // 更新編輯頁面的內容
        Route::delete('{answer}', 'AnswerController@destroy'); // 刪除一筆答案

        Route::post('{answer}/voteUp', 'AnswerController@voteUp');  
        Route::post('{answer}/voteDown', 'AnswerController@voteDown'); 
        Route::post('{answer}/voteCancel', 'AnswerController@voteCancel'); 
    });
    Route::prefix('notifications')->group(function () { 
        Route::get('index', 'NotificationController@showAll');
        Route::post('readAll', 'NotificationController@readAll');
        Route::post('{notification}', 'NotificationController@read');
    });
});
Route::middleware(['auth'])->group(function(){
    Route::get('/user', 'UserController@indexSelf')->name('user');
    Route::post('/user', 'UserController@update');
});
Route::prefix('questions')->group(function () {  // 無須登入
    Route::get('index', 'QuestionController@index');  // with order param
    Route::get('{question}', 'QuestionController@show');  // 顯示單筆問題
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', function (){
    if (Auth::user()) return redirect('home');
    return view('login');
})->name("login");

Route::get('/register_customer', function (){
    if (Auth::user()) return redirect('home');
    return view('register_customer');
});

Route::get('/register_sales', function (){
    if (Auth::user()) return redirect('home');
    return view('register_sales');
});
Route::get('forum', 'QuestionController@index');

Route::get('/forum_view', function (){
    return view('forum_view');
});
Route::get('/forum_post', function (){
    return view('forum_post');
});
Route::get('/sales/{user}', 'UserController@show');
Route::get('/sales/index/{typeId}', 'UserController@sales');
Route::post('/sales/sendNotice/{user}', 'UserController@sendNotice');

Route::get('/analyze', 'ExpertQuestionController@question');
Route::post('/analyze', 'ExpertQuestionController@analyze');

Route::get('/expertRecord', 'ExpertRecordController@index');
