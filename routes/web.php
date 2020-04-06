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

Route::get('/post_searches', 'Post_SearchesController@index'); //注意喚起情報投稿検索

Route::get('/area_searches', 'Area_SearchesController@index');

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
    Route::resource('post_searches', 'Post_SearchesController', ['only' => ['index']]);
    Route::resource('area_searches', 'Area_SearchesController', ['only' => ['index']]);
    Route::resource('unsubscribe', 'UnsubscribesController', ['only' => ['index']]);
    Route::resource('alertcomments', 'AlertcommentsController', ['only' => ['show', 'store', 'destroy']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favoritings', 'UsersController@favoritings')->name('users.favoritings');
        Route::post('image', 'UsersController@image')->name('users.image');
        });
    Route::group(['prefix' => 'alerts/{id}'], function () {
                Route::post('favorite', 'FavoritesController@store')->name('alerts.favorite');
                Route::delete('unfavorite', 'FavoritesController@destroy')->name('alerts.unfavorite');
        });
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
