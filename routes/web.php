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

Route::get('/manage/edit/{tabletoedit}/{id}', 'PagesController@getManage')->name('edit');
Route::get('/manage', 'PagesController@getManage')->name('manage');
Route::get('/roster', 'PagesController@getRoster')->name('roster');
Route::get('/matches', 'PagesController@getMatches')->name('matches');
Route::get('/home', 'PagesController@getHome');
Route::get('/', 'PagesController@getHome')->name('home');

Route::put('/manage/save/user/{id}', 'DatabaseController@saveUser')->name('saveUser');
Route::put('/manage/save/team/{id}', 'DatabaseController@saveTeam')->name('saveTeam');
Route::put('/manage/create/team', 'DatabaseController@createTeam')->name('createTeam');

Auth::routes();
