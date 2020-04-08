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

Route::get('/', 'LinksController@index')->name('main');
Route::post('/links/store', 'LinksController@store')->name('storeLink');

Route::get('/:link', 'LinksController@link')->name('main');
