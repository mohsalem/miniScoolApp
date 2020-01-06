<?php

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');
Route::group(['middleware' => ['auth:api','role:admin']], function()
{
    //admin's apis
    Route::post('addSchool', 'adminController@add_school');
    Route::post('addClass', 'adminController@add_class');
});
Route::group(['middleware' => ['auth:api','role:teacher']], function()
{
	//teacher's apis
    Route::post('details', 'UserController@details');
    Route::get('showClasses', 'teacherController@show_classes');
    Route::get('showStudents', 'teacherController@show_students');
    Route::get('class/{class}', 'teacherController@show_class_students');
    Route::post('evaluate', 'teacherController@evaluate_student');

    Route::post('addStudent', 'teacherController@add_student');
    Route::post('deleteStudent', 'teacherController@del_student');


});

Route::group(['middleware' => ['auth:api','role:parent']], function()
{
   ////parent's apis
	Route::get('parentStudents', 'parentController@show_students');
	Route::get('parentStudents_evaluations', 'parentController@show_evaluations');


});

