<?php
/*
+    Organizacion de rutas
+*/
Route::get('/profiles', [
    'as' => 'list_profiles',
    'uses' => "ProfileController@index"]);
Route::get('/profiles/asignados', [
    'as' => 'list_profiles_asigned',
    'uses' => "ProfileController@list_profiles_signed"]);

Route::get('/profiles/{id}', [
    'as' => 'asignacion',
    'uses' => "ProfessionalController@index"]);

Route::post('/register_tribunal', [
    'as' => 'register_tribunal',
    'uses' => "ProfessionalController@store"]);
