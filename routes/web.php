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

Route::get('/', 'EventController@home')->name('home');
Route::get('/event/create', 'EventController@create')->name('create-event');
Route::get('/event/edit/{event}', 'EventController@edit')->name('edit-event');
Route::get('/event/raw/{event}', 'EventController@raw');
Route::get('/event/all/raw', 'EventController@allRaw');
Route::get('/events/all/raw', 'EventController@rawIndex');
Route::post('/event/create', 'EventController@store');
Route::post('/event/edit', 'EventController@update');
Route::post('/event/signup', 'EventController@signup');
Route::get('event/{event}', 'EventController@show');


Route::get('admin', 'AdminController@show');




Route::get('/koncept', 'EventController@concept')->name('concept');


Route::get('/kontakt', function (){
    return view('contact');
})->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
