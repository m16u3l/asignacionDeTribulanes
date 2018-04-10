@extends('layouts.base')
@section('content')
<div class=" col-lg-12 body-bg">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="mt-4">
  <br>
  <br>
  <ul class="list-group" id="profile_list">
    @foreach($profiles as $profile)
      <li class="list-group-item list-group-item-action element-bg mb-3">
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
                <button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal"
                  data-title="{{$profile->degree}}"
                  data-applicant_name="{{$profile->applicant_name}}"
                  data-applicant_last_name_father="{{$profile->applicant_last_name_father}}"
                  data-applicant_last_name_mother="{{$profile->applicant_last_name_mother}}"
                  data-tutor_name="{{$profile->tutor_name}}"
                  data-tutor_last_name_father="{{$profile->tutor_last_name_father}}"
                  data-tutor_last_name_mother="{{$profile->tutor_last_name_mother}}"
                  data-title_modality="{{$profile->degree_modality}}"
                  data-objective="{{$profile->objective}}"
                  data-area="{{$profile->name}}"
                ><i class="fa fa-info"></i></button>
                <br><br>
              </div>

            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>

@include('profiles_assigned_professionals.modal_show_profile_assigned')
@endsection

@section('js_own')
<script type="text/javascript" src="{{ url('asset/court_assignment/list_profiles.js')}}"></script>
<script type="text/javascript" src="{{ url('js/search_bar.js')}}"></script>
@endsection
@section('css_own')
<link href="{{ url('css/search_bar.css')}}" rel="stylesheet" type="text/css">
</div>
