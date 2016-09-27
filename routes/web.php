<?php
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout')->middleware('auth');

Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
Route::post('register', 'Auth\RegisterController@postRegister');

Route::get('projects', 'ProjectController@index')->middleware('auth');
Route::get('projects/create', 'ProjectController@create')->middleware('auth');
Route::get('projects/{project}', 'ProjectController@show')->middleware('auth');
Route::post('projects/store', 'ProjectController@store')->middleware('auth');
Route::get('projects/{project}/edit', 'ProjectController@edit')->middleware('auth');
Route::patch('projects/{project}', 'ProjectController@update')->middleware('auth');
Route::delete('projects/{project}/delete', 'ProjectController@delete')->middleware('auth');
Route::get('projects/{project}/delete', 'ProjectController@deleteGet')->middleware('auth');


Route::get('tasks', 'TaskController@index')->middleware('auth');
Route::post('tasks/{project}/store', 'TaskController@store')->middleware('auth');
Route::get('tasks/{task}', 'TaskController@show')->middleware('auth');
Route::get('tasks/{task}/edit', 'TaskController@edit')->middleware('auth');
Route::patch('tasks/{task}', 'TaskController@update')->middleware('auth');
Route::delete('tasks/{task}/delete', 'TaskController@delete')->middleware('auth');
Route::post('tasks/{task}/close', 'TaskController@close')->middleware('auth');
