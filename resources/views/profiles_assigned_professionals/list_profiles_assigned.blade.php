@extends('layouts.base')

@section('head')
<title> Perfiles con tribunales asignados - Asignacion de tribunales UMSS</title>
@endsection

@section('child_css')
  <link href="{{ url('css/search_bar.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="mt-4">
  <br>
  <br>
  <ul class="list-group" id="profile_list">
    @foreach($profiles as $profile)
    <!--li class="list-group-item list-group-item-action element-bg mb-3">
      <div class="row">
        <div class="col-12 col-lg-10 text-justify">
          <h2 class="bold h6 mb-3 text-center mb-3"> {{$profile->degree}} </h2>
          <div class="row">
            <div class="col-md-6">
              <label class="h6 texto">Estudiante:</label>
            </div>
            <div class="col-md-6">
              <label class=" texto">{{$profile->applicant_name}}  {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</label><br>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="h6 texto">Tutor(es):</label><br>
            </div>
            <div class="col-md-6">
              <label class=" texto">{{$profile->tutor_name}}  {{$profile->tutor_last_name_father}}  {{$profile->tutor_last_name_mother}}</label><br>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label class="h6 texto">Carrera:</label>
            </div>
            <div class="col-md-6">
              <label class=" texto">Informatica</label>
            </div>
          </div>

        </div>

        <div class="col-lg-1 col-12 text-center">
          <br>
          <div class="row">
            <div class="col-6 col-md-12">
              <button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-title="{{$profile->degree}}"
                data-applicant_name="{{$profile->applicant_name}}" data-applicant_last_name_father="{{$profile->applicant_last_name_father}}"
                data-applicant_last_name_mother="{{$profile->applicant_last_name_mother}}" data-tutor_name="{{$profile->tutor_name}}"
                data-tutor_last_name_father="{{$profile->tutor_last_name_father}}" data-tutor_last_name_mother="{{$profile->tutor_last_name_mother}}"
                data-title_modality="{{$profile->degree_modality}}" data-objective="{{$profile->objective}}" data-area="{{$profile->name}}"><i class="fa fa-info"></i></button>
              <br><br>
            </div>

          </div>
        </div>
      </div>
    </li-->

    <div class="card list-group-item-action element-bg mb-1">
      <div class="card list-group-item-action">
        <div class="card-header clearfix">
          <div class="row">
            <div class="col-lg-11" data-toggle="collapse" href="#{{$profile->degree}}">
              <h6 class="">{{$profile->degree}}</h6>
            
              <h6 class="h6 d-inline">Tesista:</h6>
              <p class="mb-0 d-inline"> {{$profile->applicant_name}} {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</p>
            </div>
            <div class="col-lg-1 col-12 text-center row-sm-center">
              <a href="{{ route ('asignacion',[$profile->id])}}" class="btn bg-theme-5 "><i class="fa fa-users"></i></a>
            </div>
          </div>
        </div>

        <div class="card-body collapse" id="{{$profile->degree}}">
          <div class="row">
            <div class="col-lg-11">
              <div class="row">
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Tutor(es):</label>
                  <p class="card-text mb-2">{{$profile->tutor_name}} {{$profile->tutor_last_name_father}} {{$profile->tutor_last_name_mother}}</p>
                </div>
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Area(s):</label>
                  <p class="card-text mb-2">{{$profile->area->name or 'Sin area'}}</p>
                </div>
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Carrera:</label>
                  <p class="card-text mb-2">Informatica</p>
                </div>
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Modalidad:</label>
                  <p class="card-text mb-2  ">{{$profile->degree_modality}}</p>
                </div>
                <div class="col">
                  <label class="h6 card-subtitle">Objetivo:</label>
                  <p class="card-text">{{$profile->objective}}</p>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>


    @endforeach
  </ul>
  @include('profiles_assigned_professionals.modal_show_profile_assigned')
@endsection

@section('child_js')
  <script type="text/javascript" src="{{ url('asset/court_assignment/list_profiles.js')}}"></script>
  <script type="text/javascript" src="{{ url('js/search_bar.js')}}"></script>
@endsection
