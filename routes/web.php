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

//~ Route::get('/', 'PagesController@home');
//~ Route::get('/about', 'PagesController@about');
//~ Route::get('/contact', 'PagesController@contact');

//~ Route::get('/projects','ProjectsController@index');
//~ Route::get('/projects/create','ProjectsController@create');

//~ Route::post('/projects','ProjectsController@store');


Route::get('/', 'HomeController@index');
Route::get('/articles', 'ArticlesController@index');

Route::get('/articles/{post_name}', 'ArticlesController@show');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');