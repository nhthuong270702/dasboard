<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('login', 'API\UserController@getlogin')->name('getlogin');
Route::get('logout', 'API\UserController@logout')->name('logout');
Route::get('register', 'API\UserController@getRegister')->name('getregister');
Route::post('login', 'API\UserController@login')->name('login');
Route::post('register', 'API\UserController@register')->name('register');

Route::group(['middleware' => 'auth',], function () {
    //user routes
    Route::group(['middleware' => 'admin','prefix' => 'user', 'namespace' => 'API', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@index')->name('list');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('create', 'UserController@register')->name('store');
        Route::get('edit/{id}', 'UserController@show')->name('edit');
        Route::put('edit/{id}', 'UserController@update')->name('update');
        Route::get('delete/{id}', 'UserController@detroy')->name('delete');
    });
    //student routes
    Route::group(['prefix' => 'student', 'namespace' => 'API', 'as' => 'student.'], function(){
        Route::get('/', 'StudentController@index')->name('list');
        Route::get('create', 'StudentController@create')->name('create')->middleware('admin');
        Route::post('create', 'StudentController@store')->name('store')->middleware('admin');
        Route::get('edit/{id}', 'StudentController@edit')->name('edit')->middleware('admin');
        Route::put('edit/{id}', 'StudentController@update')->name('update')->middleware('admin');
        Route::get('delete/{id}', 'StudentController@destroy')->name('detroy')->middleware('admin');
        Route::get('countstudents', 'StudentController@countStudent')->name('countstudent');
    });
    //grade routes
    Route::group(['prefix' => 'grade', 'namespace' => 'API', 'as' => 'grade.'], function(){
        Route::get('/', 'GradeController@index')->name('list');
        Route::get('create', 'GradeController@create')->name('create')->middleware('admin');
        Route::post('create', 'GradeController@store')->name('store')->middleware('admin');
        Route::get('edit/{id}', 'GradeController@edit')->name('edit')->middleware('admin');
        Route::put('edit/{id}', 'GradeController@update')->name('update')->middleware('admin');
        Route::get('delete/{id}', 'GradeController@destroy')->name('delete')->middleware('admin');
        Route::get('showstudent/{id}', 'GradeController@showStudentInGrade')->name('student');
        Route::get('show', 'GradeController@allClassStudent')->name('all');
    });
});


