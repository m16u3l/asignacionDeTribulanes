@extends('layouts.base') 
@section('head')
<title>Importar Modalidades</title>
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

  <h5 class="h5 text-center">IMPORTACION DE MODALIDADES</h5>
  <div class="row">
    <div class="col-md-6">
      <h6 class="h6 mt-3 text-center">EJEMPLO DE DOCUMENTO</h6>
      <img class="text-center img-fluid" src="/images/modalidades_ejemplo.png" alt="">
      <h6 class="h6 mt-2">Seleccione el documento del cual desea importar datos</h6>
      <input id="modalitiesFile" type="file" name="modalitiesFile">

      <input id="import" class="btn bg-theme-4 text-center my-2 " type="submit" value="Importar" style="Color:white">
    </div>
    <div class="col-md-6">
      <h6 class="h6 text-center mt-3">ESPECIFICACIONES DEL DOCUMENTO</h6>
      <ul class="list">
        <li class="list-item">El documento a ser importado debe estar en formato .xlsx</li>
        <li class="list-item">La primera fila debe tener columnas cuyo contenido sea "codigo", "nombre", "descripcion", de izquierda
          a derecha en ese orden.
        </li>
        <li class="list-item">Las siguientes filas deben contener los datos especificados anteriormente. Por ejemplo "1", "Trabajo Dirigido" y "Consiste en etc..."</li>
      </ul>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
 
@section('child_js')
<script type="text/javascript" src="{{asset('js/info_messages.js')}}"></script>
@endsection