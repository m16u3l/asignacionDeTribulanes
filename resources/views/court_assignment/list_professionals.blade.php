@extends('layouts.base')
@section('content')
<br>

  <div class="row container-fluid">
    <div class=" col-12 col-lg-12 text-justify element-bg">
      <br>
      <h2 class="bold h4 mb-3">{{$profile->title}}</h2>
      <br>
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="perfil col-5 col-lg-3">
            <label class="bold texto">Estudiante:</label> <br>
            <label class="bold texto">Tutor(es):</label><br>
            <label class="bold texto">Modalidad:</label>
          </div>
          <div class="perfil col-5 col-lg-7">
            <label class=" texto">{{$profile->applicant_name}}  {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</label> <br>
            <label class=" texto">{{$profile->tutor_name}}  {{$profile->tutor_last_name_father}}  {{$profile->tutor_last_name_mother}}</label><br>
            <label class=" texto">{{$profile->degree_modality}}</label>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="perfil col-6 col-lg-3">
            <label class="bold texto">Area:</label> <br>
            <label class="bold texto">sub-area(s):</label><br>
            <label class="bold texto"></label>
          </div>
          <div class="perfil col-5 col-lg-7">
            <label class="bold texto">{{$area->name or 'Sin area'}}</label> <br>
            <label id="title"  class="bold texto"></label><br>

          </div>
        </div>
      </div>
<br>
      <br>

      <h4>ASIGNAR TRIBUNAL</h4>
      <br>
      @foreach($professionals_asignados as $professional_asignado)
      <form  action="index.html" method="post">

        <div class="form-group form-inline">
          <input type="text" class=" form-control "  value="{{$professional_asignado->name}}">
          <button  type="button" class="btn btn-link" ><i class="menos fa fa-minus-circle"></i></button>

        </div>
        @endforeach
        <div class="prueba">

        </div>
      </form>


      <br>
      
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="perfil col-12 col-lg-12">
          <button  id="add" type="button" class="btn btn-primary" >ASIGNAR TRIBUNALES</button>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <a href="{{ route ('list_profiles')}}" type="button" class="btn btn-danger pull-right">atras</a>

        </div>
      </div>

      <br>
    </div>
  </div>

@include('court_assignment.modal_show_professionals')
@endsection

@section('js_own')
<script type="text/javascript" src="{{url('asset/court_assignment/chose_professional.js')}}"></script>
@endsection
