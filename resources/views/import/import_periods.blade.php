@extends('layouts.base') 
@section('head')
<title>Importar Periodos</title>
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

  <h5 class="h5 text-center" for="fileProfessionals">IMPORTACION DE PERIODOS</h5>
  <div class="row">
    <div class="col-md-6">
      <h6 class="h6 mt-3 text-center">EJEMPLO DE DOCUMENTO</h6>
      <img class="text-center img-fluid" src="/images/periodos_ejemplo.png" alt="" style="display: block; margin-left: auto; margin-right: auto;
    ">
      <h6 class="h6 mt-2">Seleccione el documento del cual desea importar datos</h6>

      <input id="periodsFile" type="file" name="periodsFile">

      <input id="import" class="btn bg-theme-4 text-center my-2 " type="submit" value="Importar" style="Color:white">
    </div>
    <div class="col-md-6">
      <h6 class="h6 text-center mt-3">ESPECIFICACIONES DEL DOCUMENTO</h6>
      <ul class="list">
        <li class="list-item">El documento a ser importado debe estar en formato .xlsx</li>
        <li class="list-item">La primera fila debe tener columnas cuyo contenido sea "codigo", "fecha_ini", "fecha_fin", "periodo", de izquierda
          a derecha en ese orden.
        </li>
        <li class="list-item">Las siguientes filas deben contener los datos especificados anteriormente. Por ejemplo "1", "1/1/1900" como fecha
          de inicio, "1/6/1900" como fecha de finalizacion y "1" como periodo del año.</li>
        <li class="list-item">La fecha usa el formato de dia/mes/año.</li>
        <li class="list-item">El campo de periodo deberia ser 1 o 2, pues corresponde a la primera o segunda parte del año academico.</li>
      </ul>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
 
@section('child_js')
<script type="text/javascript" src="{{asset('js/info_messages.js')}}"></script>
@endsection