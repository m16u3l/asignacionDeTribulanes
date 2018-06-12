@extends('layouts.base') 
@section('head')
<title>Importar Perfiles</title>
@endsection
 
@section('child_css')
@endsection
 
@section('content')
<div class="col">

  {!! Form::open(array('class'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data')) !!} {{ csrf_field() }} @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif @if (session('bad_status'))
  <div class="alert alert-danger">
    <li>{{ session('bad_status') }}</li>
  </div>
  @endif @if (session('status'))
  <div class="alert alert-success">
    <li>{{ session('status') }}</li>
  </div>
  @endif
  <h5 class="h5 text-center" for="fileProfiles">IMPORTACION DE PERFILES</h5>
  <div class="row">
    <div class="col-md-6">
      <h6 class="h6 mt-3 text-center">EJEMPLO DE DOCUMENTO</h6>
      <p class="p">Por motivos de espacio, el ejemplo sera dividido en varias filas.</p>
      <img class="text-center img-fluid" src="/images/perfiles_ejemplo1.png" alt="" style="display: block; margin-left: auto; margin-right: auto;
                ">
      <img class="text-center img-fluid" src="/images/perfiles_ejemplo2.png" alt="" style="display: block; margin-left: auto; margin-right: auto;
                ">
      <img class="text-center img-fluid" src="/images/perfiles_ejemplo3.png" alt="" style="display: block; margin-left: auto; margin-right: auto;
                ">
      <img class="text-center img-fluid" src="/images/perfiles_ejemplo4.png" alt="" style="display: block; margin-left: auto; margin-right: auto;
                ">
      <h6 class="h6 mt-2">Seleccione el documento del cual desea importar datos</h6>


      <input id="fileProfiles" type="file" name="fileProfiles">

      <input class="btn bg-theme-4 text-center my-2" type="submit" value="Importar..." style="Color:white">
    </div>
    <div class="col-md-6">
      <h6 class="h6 text-center mt-3">ESPECIFICACIONES DEL DOCUMENTO</h6>
      <ul class="list">
        <li class="list-item">Solo podran importarse perfiles si ya existen datos de areas, modalidades, periodos y profesionales, esto con 
          el fin de evitar inconsistencias.
        </li>
        <li class="list-item">El documento a ser importado debe estar en formato .xlsx</li>
        <li class="list-item">La primera fila debe tener columnas cuyo contenido sea "TITULO PROYECTO FINAL", "NOMBRE TUTOR", "APELLIDO PATERNO TUTOR", "APELLIDO MATERNO TUTOR", 
            "NOMBRE POSTULANTE", "APELLIDO PATERNO POSTULANTE", "APELLIDO MATERNO POSTULANTE", "OBJETIVO GENERAL", "AREA", "MODALIDAD TITULACION",
         
          "CARRERA" de izquierda a derecha en ese orden.
        </li>

      </ul>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection