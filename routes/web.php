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


Route::get('/', 'PagesController@home');

Route::get('/try', 'PagesController@try');



Route::get('/tutorials', 'tutorialsController@index');
Route::post('tutorials', 'tutorialsController@store');
Route::get('/tutorials/create', 'tutorialsController@create');

Route::get('/tutorials/{tutorial}', 'tutorialsController@show');
Route::get('tutorials/{tutorial}/edit', 'tutorialsController@edit');
Route::patch('/tutorials/{tutorial}', 'tutorialsController@update');
Route::delete('/tutorials/{tutorial}', 'tutorialsController@destroy');
Route::patch('/tutorials/{tutorial}', 'tutorialsController@update');


Route::patch('/tasks/{task}', 'tutorialsTaskController@update');
Route::post('/tutorials/{tutorial}/tasks/', 'tutorialsTaskController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
