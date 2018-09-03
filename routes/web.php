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

//route auth
Route::group(['prefix' => 'auth'], function () {
    //auth route
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

    //login socail
    Route::get('/login/{social}', 'Auth\SocialLoginController@redirectToProvider');
    Route::get('/login/{social}/callback', 'Auth\SocialLoginController@handleProviderCallback');
});

//route admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        //auth admin home
        Route::get('/home', 'HomeController@index')->name('admin.home');

        // route resource post
        Route::resource('post', 'PostController');

        //route resource manager
        Route::resource('user', 'UserController');
});

//route frontend
Route::group(['namespace' => 'Frontend'], function () {
    // home
    Route::get('/', function () {
        return view('frontend.home');
    });

    // route resource post
    Route::resource('post', 'PostController');
});






