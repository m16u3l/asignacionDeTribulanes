<?php
/*
    rutas de asignacion de tribunales
*/
Route::get('/perfiles', [
    'middleware' => 'auth',
    'as' => 'list_profile',
    'uses' => "ProfileController@list_profile"]);

Route::get('/perfiles/asignados', [
    'middleware' => 'auth',
    'as' => 'list_profile_asigned',
    'uses' => "ProfileController@list_profiles_signed"]);

Route::get('/perfiles/finalizados', [
    'middleware' => 'auth',
    'as' => 'list_profile_finalized',
    'uses' => "ProfileController@list_profile_finalized"]);

Route::get('/perfiles/{id}', [
    'middleware' => 'auth',
    'as' => 'asignacion',
    'uses' => "ProfessionalController@index"]);

Route::post('/registrar_tribunal', [
    'middleware' => 'auth',
    'as' => 'register_court',
    'uses' => "ProfessionalController@store"]);

Route::post('/finalizar_perfil', [
    'middleware' => 'auth',
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
    'middleware' => 'auth',
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@upload_professionals']);

Route::post('import_professionals', [
    'middleware' => 'auth',
    'as' => 'import_professionals',
    'uses' => 'ProfessionalController@import_professionals']);

Route::get('import_profiles', [
    'middleware' => 'auth',
    'as' => 'import_profiles',
    'uses' => 'ProfileController@upload_profiles']);

Route::post('import_profiles',[
  'as'=>'import_profiles',
  'uses'=>'ProfileController@import_profiles']);

Route::get('import_areas',[
    'middleware' => 'auth',
    'as' => 'import_areas',
    'uses' => 'AreaController@upload_areas']);

Route::post('import_areas',[
    'middleware' => 'auth',
    'as' => 'import_areas',
    'uses' => 'AreaController@import_areas']);

Route::get('import_periods',[
    'middleware' => 'auth',
    'as' => 'import_periods',
    'uses' => 'AcademicTermController@upload_periods']);

Route::post('import_periods',[
    'middleware' => 'auth',
    'as' => 'import_periods',
    'uses' => 'AcademicTermController@import_periods']);

Route::get('import_modalities',[
    'middleware' => 'auth',
    'as' => 'import_modalities',
    'uses' => 'ModalityController@upload_modalities']);

Route::post('import_modalities',[
    'middleware' => 'auth',
    'as' => 'import_modalities',
    'uses' => 'ModalityController@import_modalities']);



//listas de importaciones...
Route::get('/lista_perfiles', [
    'middleware' => 'auth',
    'as' => 'lista_perfiles',
    'uses' => "ProfileController@profiles_list"]);


//lista de ares
Route::get('/lista_areas', [
    'middleware' => 'auth',
    'as' => 'lista_areas',
    'uses' => "AreaController@areas_list"]);

//registrar area
Route::post('/registrar_area', [
    'middleware' => 'auth',
  'as' => 'create_area',
  'uses' => 'AreaController@create'
]);


//lista profesional
Route::get('/lista_profesionales', [
    'middleware' => 'auth',
    'as' => 'lista_profesionales',
    'uses' => "ProfessionalController@professional_list"]);


Route::post('/registrar_profesional', [
    'middleware' => 'auth',
  'as' => 'create_professional',
  'uses' => 'ProfessionalController@create'
]);

//acualizar profesional
Route::post('/actualizar_profesional', [
    'middleware' => 'auth',
  'as' => 'update_professional',
  'uses' => 'ProfessionalController@update'
]);

//Reportes de perfiles
Route::get('/reporte/{id}', [
    'middleware' => 'auth',
    'as' => 'reporte',
    'uses' => "ProfileController@show"]);

Route::get('/reportes', [
    'middleware' => 'auth',
    'as' => 'reportes',
    'uses' => "ProfileController@reports"]);
    
Route::post('/send_mail', [
        'middleware' => 'auth',
        'as' => 'send_mail',
        'uses' => "MailController@store"]);
    
        Auth::routes();


