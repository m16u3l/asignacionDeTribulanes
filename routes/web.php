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

Route::get('/profiles', ['as' => 'list_profiles', 'uses' => "ProfileController@index"]);
Route::get('/profiles/{id}', ['as' => 'asignacion', 'uses' => "ProfessionalController@index"]);
