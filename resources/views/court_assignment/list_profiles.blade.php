@extends('layouts.base')
@section('content')
  @if ($profiles->isEmpty())
  <h1> No existen perfiles</h1>
  @else
<div class=" col-lg-12 body-bg">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="mt-4">
  <br>
  <br>
  <ul class="list-group ">
    @foreach($profiles as $profile)
      <li class="list-group-item list-group-item-action element-bg mb-3">
        <div class="row">
          <div class="col-12 col-lg-11 text-justify">
            <h2 class="bold h5 mb-3"> {{$profile->title}} </h2>
            <div class="perfil col-2 col-lg-2">
              <label class="bold texto">Estudiante:</label> <br>
              <label class="bold texto">Tutor(es):</label><br>
              <label class="bold texto">Carrera:</label>
            </div>
            <div class="perfil  col-6 col-lg-6">
              <label class=" texto">{{$profile->applicant_name}}  {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</label><br>
              <label class=" texto">{{$profile->tutor_name}}  {{$profile->tutor_last_name_father}}  {{$profile->tutor_last_name_mother}}</label><br>
              <label class=" texto">Informatica</label>
            </div>
          </div>

          <div class="col-lg-1 col-3 text-center">
            <br>
            <button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal"
              data-title="{{$profile->title}}"
              data-applicant_name="{{$profile->applicant_name}}"
              data-applicant_last_name_father="{{$profile->applicant_last_name_father}}"
              data-applicant_last_name_mother="{{$profile->applicant_last_name_mother}}"
              data-tutor_name="{{$profile->tutor_name}}"
              data-tutor_last_name_father="{{$profile->tutor_last_name_father}}"
              data-tutor_last_name_mother="{{$profile->tutor_last_name_mother}}"
              data-title_modality="{{$profile->title_modality}}"
              data-objective="{{$profile->objective}}"
              data-name="{{$profile->name}}"
            ><i class="fa fa-info"></i></button>
            <br><br>
            <a
            <a href="{{ route ('crear_obra',[$profile->id])}}" class="btn btn-success"><i class="fa fa-users"></i></a>
          </div>
        </div>
      </li>
      @endforeach
    </ul>

  @endif
@include('court_assignment.modal_show_profile')
@endsection

@section('js_own')
<script type="text/javascript" src="asset/court_assignment/list_profiles.js"></script>
@endsection
</div>
