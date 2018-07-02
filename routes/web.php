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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();




Route::resource('agents', 'AgentController');
Route::resource('tours', 'TourController');
Route::resource('users', 'UserController');
Route::put('me', 'UserController@updateProfile');
Route::put('tours/edit/{id}', 'TourController@updateTour');
Route::get('agents/edit/{id}', 'AgentController@updateAgent');
Route::get('me', 'UserController@show');




Route::get('register', function() {
   abort(404) ;
});
Route::get('*', function() {
    return view('/') ;
});