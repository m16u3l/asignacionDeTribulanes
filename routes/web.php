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

Route::get('/', function () {

    $perfil1 = array(
        'nombrePerfil'=>'Perfil Test 1',
        'nombreTesista'=>'Tesista X1',
        'nombreTutor'=>'Tutor Test 1',
        'carrera'=>'Informatica',
        'area'=>'Bases de datos',
        'subareas'=>['SubArea1', 'SubArea2'],
        'modalidad'=>'Proyecto de Grado'
    );
    return view('content')-> with($perfil1);
});


