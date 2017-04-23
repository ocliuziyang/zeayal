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

Route::group(['prefix' => '/'], function () {
   Route::get('/', 'BlogController@index');
   Route::get('/posts', 'BlogController@posts');
   Route::get('/posts/{id}', 'BlogController@show');
   Route::get('/about', 'BlogController@about');
   Route::get('/contact', 'BlogController@contact');

});



Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin'], function () {

    Route::get('login', 'Auth\LoginController@getLogin')->name('admin.login');
    Route::post('login', 'Auth\LoginController@postLogin')->name('admin.login');
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('/', 'HomeController@index');
});


Route::group(['prefix' => 'api/v1', 'namespace' => 'Admin\Api'], function () {

    Route::get('users/adminInfo', 'UserController@adminInfo');
    Route::resource('users', 'UserController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
    Route::post('uploadFile', 'UploadController@upload');
});

