@extends('layouts.base')
@section('content')
<br>

  <div class="container-fluid">
    <div class=" col-12 col-lg-12 element-bg">
      <br>
      <h2 class="bold h4 mb-3">{{$profile->degree}}</h2>
      <br>
      <div class="row">

          <div class="perfil col-12 col-md-3">
            <label class="h6 texto">Estudiante:</label>
          </div>
          <div class="perfil col-12 col-md-3">
            <label class=" texto">{{$profile->applicant_name}}  {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</label>
          </div>

          <div class="col-12 col-md-3">
              <label class="h6 texto">Area:</label> <br>
          </div>
          <div class="col-12 col-md-3">
            <label class="texto">{{$area->name or 'Sin area'}}</label> <br>
          </div>
          <div class="perfil col-12 col-md-3">  
            <label class="h6 texto">Tutor(es):</label>
          </div>
          <div class="perfil col-12 col-md-3">
            <label class=" texto">{{$profile->tutor_name}}  {{$profile->tutor_last_name_father}}  {{$profile->tutor_last_name_mother}}</label>
          </div>
          <div class="col-12 col-md-6">
            <label class="h6 texto">Sub-area(s):</label><br>
          </div>    
         <div class="perfil col-12 col-md-3">  
            <label class="h6 texto">Modalidad:</label>
          </div>
          <div class="perfil col-12 col-md-3">
            <label class=" texto">{{$profile->degree_modality}}</label>
          </div>
 
        </div>
    
      <br>

      <h4>ASIGNAR TRIBUNALES</h4>
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
            <button  id="add" type="button" class="btn btn-link" >Asignar mas tribunales</button>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <a href="{{ route ('list_profiles')}}" type="button" class="btn btn-info pull-right">Atras</a>

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
