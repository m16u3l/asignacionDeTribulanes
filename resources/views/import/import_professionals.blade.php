@extends('layouts.base')
@section('head')
<title>Importar Area</title>
@endsection

@section('child_css')
@endsection

@section('content')
<div class="col-md-4 offset-md-3">
  <form class="form " action="" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
      <h5 class="h5 text-center" for="fileProfessionals">Importar profesionales</h5>
      <p>Seleccione el archivo del cual desea importar datos</p>

      <input id="fileProfessionales" type="file" name="fileProfessionals" required>

    <input class="btn bg-theme-4 text-center my-2" type="submit" value="Importar..." style="Color:white"  >
    <p class="small">Nota: El archivo debe estar en formato .xlsx</p>
  </form>
</div>
@endsection
