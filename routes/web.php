<?php

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
    return view('auth.login');
});



Route::get('/admin/user/{id}/edit', 'AdminController@edit')->name('userEditPage');
Route::get('/admin/user/makeAdmin/{id}', 'AdminController@makeAdmin')->name('makeAdmin');
Route::get('/admin/user/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/admin/userEdit/{id}', 'AdminController@userEdit')->name('userEdit');

Route::get('/settings', 'HomeController@settings')->name('settings');
Auth::routes();

Route::post('/createProfile', 'ProfileController@createProfile')->name('createProfile');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('refreshcaptcha', 'CaptchaController@refreshCaptcha');

Route::resource('course', 'CourseController');
Route::get('/course/{id}/show', 'HomeController@course');

Route::post('/searchUser', 'AdminController@search');
