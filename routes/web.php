<?php
/*
    rutas de asignacion de tribunales
*/
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

/*store_rejection_request
 Rutas de solicitud de renuncia
*/
Route::get('/solicitud/{id}', [
    'as' => 'solicitud_rununcia',
    'uses' => "ProfileController@solicitud_rununcia"]);

Route::post('/rejection_request', [
    'as' => 'rejection_request',
    'uses' => "ProfessionalController@store_rejection_request"]);
/*
+ Rutas de Importacion
+*/

Route::get('import_professionals', [
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@upload_professionals']);

Route::post('import_professionals', [
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@import_professionals']);

Route::get('import_profiles', [
    'as' => 'import_profiles',
    'uses' => 'ProfileController@upload_profiles']);

Route::post('import_profiles',[
  'as'=>'import_profiles',
  'uses'=>'ProfileController@import_profiles']);

Route::get('import_areas',[
    'as' => 'import_areas',
    'uses' => 'AreaController@upload_areas']);

Route::post('import_areas',[
    'as' => 'import_areas',
    'uses' => 'AreaController@import_areas']);

Route::get('import_periods',[
    'as' => 'import_periods',
    'uses' => 'AcademicTermController@upload_periods']);

Route::post('import_periods',[
    'as' => 'import_periods',
    'uses' => 'AcademicTermController@import_periods']);

Route::get('import_modalities',[
    'as' => 'import_modalities',
    'uses' => 'ModalityController@upload_modalities']);

Route::post('import_modalities',[
    'as' => 'import_modalities',
    'uses' => 'ModalityController@import_modalities']);



//listas de importaciones...
Route::get('/lista_perfiles', [
    'as' => 'lista_perfiles',
    'uses' => "ProfileController@profiles_list"]);


//lista de ares
Route::get('/lista_areas', [
    'as' => 'lista_areas',
    'uses' => "AreaController@areas_list"]);

//registrar area
Route::post('/registrar_area', [
  'as' => 'create_area',
  'uses' => 'AreaController@create'
]);


//lista profesional
Route::get('/lista_profesionales', [
    'as' => 'lista_profesionales',
    'uses' => "ProfessionalController@professional_list"]);

Route::get('/registrar_profesional', [
  'as' => 'create_professional',
  'uses' => 'ProfessionalController@form_register']);


Route::post('/registrar_profesional', [
  'as' => 'create_professional',
  'uses' => 'ProfessionalController@create'
]);

//acualizar profesional
Route::post('/actualizar_profesional', [
  'as' => 'update_professional',
  'uses' => 'ProfessionalController@update'
]);

//Reportes de perfiles
Route::get('/reporte/{id}', [
    'as' => 'reporte',
    'uses' => "ProfileController@show"]);
