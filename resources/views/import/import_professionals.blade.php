@extends('layouts.base')
@section('head')
<title>Importar Profesionales</title>
@endsection

@section('child_css')
@endsection

@section('content')
<div class="col-md-4 offset-md-3">
  <div id="alert" class="alert alert-info"></div>
   {!! Form::open(array('class'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data')) !!}
      {{ csrf_field() }}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    @if (session('status'))
      <div class="alert alert-success">
        <li>{{ session('status') }}</li>
    </div>
    @endif

      <h5 class="h5 text-center" for="fileProfessionals">Importar profesionales</h5>
      <p>Seleccione el archivo del cual desea importar datos</p>
    <input id="fileProfessionales" type="file" name="fileProfessionals">

    <input id="import" class="btn bg-theme-4 text-center my-2 " type="submit" value="Importar..." style="Color:white"  >
    <p class="small">Nota: El archivo debe estar en formato .xlsx</p>
   {!! Form::close() !!}
</div>
@endsection

@section('child_js')
<script type="text/javascript" src="{{asset('js/info_messages.js')}}"></script>
@endsection
