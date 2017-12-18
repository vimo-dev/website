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

Route::get('/roster', 'PagesController@getRoster')->name('roster');
Route::get('/matches', 'PagesController@getMatches')->name('matches');
Route::get('/home', 'PagesController@getHome');
Route::get('/', 'PagesController@getHome')->name('home');

Auth::routes();
