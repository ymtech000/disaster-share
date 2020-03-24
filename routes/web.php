<?php

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

Route::get('/alerts', 'AlertsController@index'); // 注意喚起

Route::get('/rescues', 'RescuesController@index'); // 救助要請

Route::get('/locations', 'LocationsController@index'); // 重要施設の共有

Route::get('/searches1','Searches1Controller@index'); //救助要請情報検索

Route::get('/searches2', 'Searches2Controller@index'); //注意喚起情報投稿検索

Route::get('/unsubscribe', 'UnsubscribesController@index'); //退会


Route::get('/', function () {
  return view('welcome');
})->name('top');;   


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function () {
Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});

// ユーザ機能
Route::group(['middleware' => 'auth'], function () {
Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]);
Route::resource('alerts', 'AlertsController'); 
Route::resource('rescues', 'RescuesController');
Route::resource('searches1', 'Searches1Controller');
Route::resource('searches2', 'Searches2Controller');
Route::resource('unsubscribe', 'UnsubscribesController');
Route::resource('alertcomments', 'AlertcommentsController', ['only' => ['show', 'store', 'destroy']]);
Route::resource('rescuecomments', 'RescuecommentsController', ['only' => ['show', 'store', 'destroy']]);
Route::resource('locations', 'LocationsController', ['only' => ['index', 'create', 'show', 'store', 'destroy']]);
});



//管理者機能
Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function() {
    Route::get('/', function () {
        return view('admin.welcome');
    });
    //ログイン
    // Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    
    //ユーザ登録
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
    
    Route::get('password/rest', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
});
//ログアウト
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

//　googlemap
Route::get('alertmaps', 'AlertmapsController@index')->name('alertmaps.index');
Route::get('rescuemaps', 'RescuemapsController@index')->name('rescuemaps.index');
Route::get('locationmaps', 'LocationmapsController@index')->name('locationmaps.index');
