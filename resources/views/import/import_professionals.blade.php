@extends('layouts.base')
@section('head')
<title>Importar Area</title>

@endsection

@section('child_css')
@endsection

@section('content')
  <div class="">
    <form  action="" method="post" enctype="multipart/form-data">
      <div class="">
          {{ csrf_field() }}
        <label for="fileProfessionals">Import Professionals</label>
        <input type="file" name="fileProfessionals" >
      </div>
      <input type="submit" value="Importar Professionales">
    </form>
  </div>

@endsection
