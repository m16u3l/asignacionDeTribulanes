<?php
/*
+    Organizacion de rutas
+*/
Route::get('/perfiles', [
    'as' => 'list_profile',
    'uses' => "ProfileController@list_profile"]);

Route::get('/perfiles/asignados', [
    'as' => 'list_profile_asigned',
    'uses' => "ProfileController@list_profiles_signed"]);

Route::get('/perfiles/finalizados', [
    'as' => 'list_profile_finalized',
    'uses' => "ProfileController@list_profile_finalized"]);

Route::get('/perfiles/{id}', [
    'as' => 'asignacion',
    'uses' => "ProfessionalController@index"]);

Route::post('/registrar_tribunal', [
    'as' => 'register_court',
    'uses' => "ProfessionalController@store"]);

Route::post('/finalizar_perfil', [
    'as' => 'finalizar_perfil',
    'uses' => "ProfileController@finalizar_perfil"]);

/*
+ Rutas de Importacion
+*/

Route::get('import_professionals', [
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@uploadProfessionals']);

Route::post('import_professionals', [
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@importProfessionals']);

Route::get('import_profiles', [
    'as' => 'import_profiles',
    'uses' => 'ProfileController@uploadProfiles']);

Route::post('import_profiles',[
  'as'=>'import_profiles',
  'uses'=>'ProfileController@importProfiles']);

Route::get('import_areas',[
    'as' => 'import_areas',
    'uses' => 'AreaController@upload_areas']);

Route::post('import_areas',[
    'as' => 'import_areas',
    'uses' => 'AreaController@import_areas']);

//listas de importaciones...
Route::get('/lista_perfiles', [
    'as' => 'lista_perfiles',
    'uses' => "ProfileController@profiles_list"]);

Route::get('/lista_areas', [
    'as' => 'lista_areas',
    'uses' => "AreaController@areas_list"]);

Route::get('/lista_profesionales', [
    'as' => 'lista_profesionales',
    'uses' => "ProfessionalController@professional_list"]);
