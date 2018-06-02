@extends('layouts.base')
@section('head')
<title>Importar Periodos</title>
@endsection

@section('child_css')
@endsection

@section('content')
<div class="col-md-4 offset-md-3">
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

      @if (session('bad_status'))
        <div class="alert alert-danger">
            <li>{{ session('bad_status') }}</li>
        </div>
      @endif

      @if (session('status'))
        <div class="alert alert-success">
            <li>{{ session('status') }}</li>
        </div>
      @endif

      <h5 class="h5 text-center" for="fileProfessionals">Importar Periodos</h5>
      <p>Seleccione el archivo del cual desea importar datos</p>
    <input id="periodsFile" type="file" name="periodsFile">

    <input id="import" class="btn bg-theme-4 text-center my-2 " type="submit" value="Importar" style="Color:white"  >
    <p class="small">Nota: El archivo debe estar en formato .xlsx</p>
   {!! Form::close() !!}
</div>

@endsection

@section('child_js')
<script type="text/javascript" src="{{asset('js/info_messages.js')}}"></script>
@endsection
