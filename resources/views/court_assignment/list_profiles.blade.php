@extends('layouts.base') 
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection
 
@section('child_css')
<link href="{{url('css/search_bar.css')}}" rel="stylesheet" type="text/css">
@endsection
 
@section('content')
<div class="col">

  <div class="container" id="profile_list">
    <div class="row">
      <div class="offset-md-1 col-md-9">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por titulo de perfil.." class="mt-4 col-8">        @foreach($profiles as $profile)
        <div class="card list-group-item-action element-bg mb-3">
          <div class="card list-group-item-action">
            <div class="card-header clearfix" data-toggle="collapse" href="#{{$profile->degree}}">
              <div class="row">
                <div class="col-md-5">
                  <h6 class="d-inline">{{$profile->degree}}</h6>
                </div>
                <div class="col-md-5">
                  Tesista: {{$profile->applicant_name}} {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}
                </div>
                <div class="col-md-1 col-6 text-center">
                  <a href="{{ route ('asignacion',[$profile->id])}}" class="btn btn-success d-inline"><i class="fa fa-users"></i></a>
                </div>
                <div class="col-md-1 col-6 text-center">
                  <button type="button" class="edit-modal btn btn-info " data-toggle="modal" data-target="#myModal" data-title="{{$profile->degree}}"
                    data-applicant_name="{{$profile->applicant_name}}" data-applicant_last_name_father="{{$profile->applicant_last_name_father}}"
                    data-applicant_last_name_mother="{{$profile->applicant_last_name_mother}}" data-tutor_name="{{$profile->tutor_name}}"
                    data-tutor_last_name_father="{{$profile->tutor_last_name_father}}" data-tutor_last_name_mother="{{$profile->tutor_last_name_mother}}"
                    data-title_modality="{{$profile->degree_modality}}" data-objective="{{$profile->objective}}" data-area="{{$profile->area->name or 'Sin area'}}"><i class="fa fa-info"></i>
                </div>
              </button>
                </div>
              </div>

              <div class="card-body collapse" id="{{$profile->degree}}">
                <div class="row">
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="h6 card-subtitle">Estudiante:</label>
                      </div>
                      <div class="col-md-6">
                        <p class="card-text m-0">{{$profile->applicant_name}} {{$profile->applicant_last_name_father}} {{$profile->applicant_last_name_mother}}</p>
                      </div>
                      <div class="col-md-6">
                        <label class="h6 card-subtitle">Tutor(es):</label>
                      </div>
                      <div class="col-md-6">
                        <p class="card-text m-0">{{$profile->tutor_name}} {{$profile->tutor_last_name_father}} {{$profile->tutor_last_name_mother}}</p>
                      </div>
                      <div class="col-md-6">
                        <label class="h6 card-subtitle">Carrera:</label>
                      </div>
                      <div class="col-md-6">
                        <p class="card-text">Informatica</p>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>

          @endforeach
        </div>
      </div>
    </div>
    <ul class="pagination">
      {{ $profiles->links() }}
    </ul>
  @include('court_assignment.modal_show_profile')
@endsection
 
@section('child_js')
    <script type="text/javascript" src="{{ url('asset/court_assignment/list_profiles.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/search_bar.js')}}"></script>
@endsection