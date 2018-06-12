@extends('layouts.base') 
@section('head')
<title>Importar Areas</title>
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

  <h5 class="h5 text-center" for="fileProfessionals">Importar Areas</h5>
  <div class="row">
    <div class="col-md-6">
      <h6 class="h6 mt-3 text-center">EJEMPLO DE DOCUMENTO</h6>
      <img class="text-center img-fluid" src="/images/areas_ejemplo.png" alt="">
      <h6 class="h6 mt-2">Seleccione el documento del cual desea importar datos</h6>

      <input id="areasFile" type="file" class="center-block" name="areasFile">
      <input id="import" class="btn bg-theme-4 my-2 center-block" type="submit" value="Importar" style="Color:white">

    </div>
    <div class="col-md-6">
      <h6 class="h6 text-center mt-3">ESPECIFICACIONES DEL DOCUMENTO</h6>
      <ul class="list-group">
        <li class="list-group-item">El documento a ser importado debe estar en formato .xlsx</li>
        <li class="list-group-item">La primera fila debe tener columnas cuyo contenido sea "CODIGO", "NOMBRE", "DESCRIPCION", "CODIGO SUBAREA", de izquierda
          a derecha en ese orden.
        </li>
        <li class="list-group-item">Las siguientes filas deben contener los datos especificados anteriormente. Por ejemplo "1", "Base de Datos", "Descripcion
          de prueba" y "2"</li>
        <li class="list-group-item">El espacio de CODIGO SUBAREA es opcional, por lo que puede quedar en blanco</li>
      </ul>
    </div>
  </div>
  {!! Form::close() !!}

</div>
@endsection
 
@section('child_js')
<script type="text/javascript" src="{{asset('js/info_messages.js')}}"></script>
@endsection