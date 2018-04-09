<?php

Route::get('/profiles', ['as' => 'list_profiles', 'uses' => "ProfileController@index"]);
Route::get('/profiles/{id}', ['as' => 'asignacion', 'uses' => "ProfessionalController@index"]);
