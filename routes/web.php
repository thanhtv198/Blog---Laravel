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
//auth route
Auth::routes();

//route logout and login social
Route::namespace('Auth')->group(function () {
    Route::get('/logout', 'LoginController@logout');

    //login social
    Route::get('/login/{social}', 'SocialLoginController@redirectToProvider');
    Route::get('/login/{social}/callback', 'SocialLoginController@handleProviderCallback');
});

//route admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //auth admin home
    Route::get('/home', 'HomeController@index')->name('admin.home');

    //login, logout admin
    Route::get('/login', 'UserController@showLoginForm');
    Route::post('/login', 'UserController@login')->name('admin.login');
    Route::get('/logout', 'UserController@logout');

    //route resource post
    Route::group(['as' => 'admin.'], function () {
        Route::resource('posts', 'PostController');
    });
    //route status post
    Route::post('posts/active/{id}', 'PostController@activePost')->name('admin.posts.active');
    Route::post('posts/inactive/{id}', 'PostController@inActivePost')->name('admin.posts.inactive');

    //route resource user
    Route::group(['as' => 'admin.'], function () {
        Route::resource('users', 'UserController');
    });
    //route status user
    Route::post('users/active/{id}', 'UserController@activeUser')->name('admin.users.active');
    Route::post('users/inactive/{id}', 'UserController@inActiveUser')->name('admin.users.inactive');
});

//route frontend
Route::group(['namespace' => 'Frontend'], function () {
    //home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search/posts', 'HomeController@searchPost')->name('search.post');

    //route resource post
    Route::resource('posts', 'PostController');

    //comment posts
    Route::post('posts/{id}/comments', 'PostController@comment')->name('posts.comment');
    Route::post('posts/{id}/replies', 'PostController@reply')->name('posts.reply');

    //route resource topic
    Route::resource('topics', 'TopicController');
    Route::get('topics/{slug}/posts', [
        'as' => 'posts',
        'uses' => 'TopicController@getPostByTopicId',
    ]);

    //route resource tag
    Route::resource('tags', 'TagController');

    //route resource user
    Route::resource('users', 'UserController');
    Route::get('users/{id}/timeline', 'UserController@getTimeline')->name('users.timeline');
});

