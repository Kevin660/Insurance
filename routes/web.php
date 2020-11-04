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
    
    Route::prefix('questions')->group(function () {  // �ݵn�J
        Route::get('create', 'QuestionController@create');  //   ��s�W����
        Route::post('store', 'QuestionController@store');   //   �x�s�s�W���������e
        Route::get('indexSelf', 'QuestionController@indexSelf'); // with order param
        Route::get('{question}/edit', 'QuestionController@edit'); // ��s�譶��
        Route::post('{question}', 'QuestionController@update');   // ��s�s�譶�������e
        Route::delete('{question}', 'QuestionController@destroy'); // �R���@�����D

        Route::post('{question}/voteUp', 'QuestionController@voteUp');  // �벼+1
        Route::post('{question}/voteDown', 'QuestionController@voteDown'); // �벼-1
        Route::post('{question}/voteCancel', 'QuestionController@voteCancel'); // �����벼
        
        Route::post('{question}/answer', 'QuestionController@answer');  // �s�W����
        Route::post('{question}/accept/{{answer}}', 'QuestionController@accept'); // �]������
    });
});

Route::prefix('questions')->group(function () {  // �L���n�J
    Route::get('index', 'QuestionController@index');  // with order param
    Route::get('{question}', 'QuestionController@show');  // ��ܳ浧���D
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
Route::get('/forum', function (){
    return view('forum');
});
Route::get('/forum_view', function (){
    return view('forum_view');
});
Route::get('/forum_post', function (){
    return view('forum_post');
});
Route::get('/analyze', function (){
    return view('analyze');
});
