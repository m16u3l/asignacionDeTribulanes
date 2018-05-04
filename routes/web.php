<?php
/*
+    Organizacion de rutas
+*/
Route::get('/perfiles', [
    'as' => 'list_profiles',
    'uses' => "ProfileController@index"]);

Route::get('/perfiles/asignados', [
    'as' => 'list_profiles_asigned',
    'uses' => "ProfileController@list_profiles_signed"]);

Route::get('/perfiles/{id}', [
    'as' => 'asignacion',
    'uses' => "ProfessionalController@index"]);

Route::post('/register_tribunal', [
    'as' => 'register_tribunal',
    'uses' => "ProfessionalController@store"]);

Route::post('/finalizar_perfil', [
    'as' => 'finalizar_perfil',
    'uses' => "ProfileController@finalizar_perfil"]);

/*
+ Rutas de Importacion
+*/

Route::get('import_professionals',[
  'as'=>'import_professionals',
  'uses'=>'ProfessionalController@uploadProfessionals']);

Route::post('import_professionals',[
  'as'=>'import_professionals',
  'uses'=>'ProfessionalController@importProfessionals']);


Route::get('import_profiles',[
  'as'=>'import_profiles',
  'uses'=>'ProfileController@uploadProfiles']);

Route::post('import_profiles',[
  'as'=>'import_profiles',
  'uses'=>'ProfileController@importProfiles']);