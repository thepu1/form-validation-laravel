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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::post('/register',[
    'uses'  =>  'RegisterController@register',
    'as'    =>  'register'
]);

Route::get('/blog',[
    'uses'  => 'BlogController@index',
    'as'    =>  'blog'
]);

Route::post('/blog/add-blog',[
    'uses'  => 'BlogController@addBlog',
    'as'    =>  'add-blog'
]);
