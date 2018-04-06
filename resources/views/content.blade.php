@extends('layouts.base') @section('headAndTittle') @parent @endsection @section('navbar') @parent @section('content')
<div class="col-lg-10 body-bg">
  <br>
  <br>
  <ul class="list-group ">
    @for ($i = 0; $i
    < 5; $i++) <li class="list-group-item list-group-item-action element-bg mb-3">

      <div class="row">
        <div class="col-12 col-lg-6 text-justify">
          <h5 class="h5 mb-3">Titulo del Perfil: {{$nombrePerfil}} </h5>
          <h5 class="h5 mb-3">Nombre del Tesista: {{$nombreTesista}} </h5>
          <h5 class="h5 mb-3">Nombre de Tutor(es): {{$nombreTutor}}</h5>
          <h5 class="h5 mb-3">Carrera: {{$carrera}} </h5>
        </div>
        <div class="col-lg-3 col-6 text-center">
          <button class="btn btn-success" data-toggle="modal" data-target="#{{$i}}Modal">Ver Detalles</button>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <button class="btn btn-info">Asignar Tribunales</button>
        </div>
      </div>

      </li>
      <!--MODAL-->
      <div class="modal fade" id="{{$i}}Modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title m-0 text-center"> {{$nombrePerfil}} </h4>
            </div>
            <div class="modal-body">
              <h5 class="h5 mb-3">Nombre del Tesista: {{$nombreTesista}} </h5>
              <h5 class="h5 mb-3">Nombre de Tutor(es): {{$nombreTutor}}</h5>
              <h5 class="h5 mb-3">Area del perfil: {{$area}} </h5>
              <h5 class="h5 mb-3">Sub-Area(s) del perfil: @foreach($subareas as $subarea) {{$subarea}} 
                @endforeach </h5>
              <h5 class="h5 mb-3">Modalidad de titulacion: {{$modalidad}} </h5>
              <hr/>
              <h4 class="h4">OBJETIVO GENERAL</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!--fin MODAL-->
      @endfor
  </ul>

</div>
@endsection @endsection @section('footer') @parent @endsection