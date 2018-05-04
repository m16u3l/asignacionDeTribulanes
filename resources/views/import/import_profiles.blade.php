@extends('layouts.base')
@section('head')
<title>Importar Perfiles</title>
@endsection

@section('child_css')
@endsection

@section('content')
<div class="col-md-4 offset-md-3">
  @if(count( $errors ) > 0)
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
  @endif </br> 
  {!! Form::open(array('class'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data')) !!}
      {{ csrf_field() }}
      <h5 class="h5 text-center" for="fileProfiles">Importar Perfiles</h5>
      <p>Seleccione el archivo del cual desea importar datos</p>

      <input id="fileProfiles" type="file" name="fileProfiles">

    <input class="btn bg-theme-4 text-center my-2" type="submit" value="Importar..." style="Color:white"  >
    <p class="small">Nota: El archivo debe estar en formato .xlsx</p>
  {!! Form::close() !!}
</div>
@endsection
