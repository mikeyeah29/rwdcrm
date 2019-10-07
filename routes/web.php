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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactsController@index')->name('contacts');
Route::post('/contacts', 'ContactsController@store');
Route::get('/contacts/add', 'ContactsController@create')->name('contacts/add');
Route::get('/contacts/{id}/edit', 'ContactsController@edit');
Route::get('/contacts/{id}', 'ContactsController@show');
Route::post('/contacts/{id}', 'ContactsController@update');
Route::delete('/contacts/{id}', 'ContactsController@destroy');
Route::get('/contacts/search', 'ContactsController@search');
Route::post('/contacts/{id}/response', 'ContactsController@setResponse');