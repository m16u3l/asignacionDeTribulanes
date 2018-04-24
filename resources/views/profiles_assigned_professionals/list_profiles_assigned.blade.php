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
  <div class="panel-body">
    {{$profiles->total()}} registros |
      pagina {{ $profiles->currentPage() }}
      de {{ $profiles->lastPage() }}
  </div>
    @foreach($profiles as $profile)


    <div class="card list-group-item-action element-bg mb-1">
      <div class="card list-group-item-action">
        <div class="card-header clearfix">
          <div class="row">
            <div class="col-lg-10" data-toggle="collapse" href="#{{$profile->title}}">
              <h6 class="">{{$profile->title}}</h6>

              <h6 class="h6 d-inline">Tesista:</h6>
              <p class="mb-0 d-inline"> {{$profile->student_name}} {{$profile->student_last_name_father}} {{$profile->student_last_name_mother}}</p>
            </div>
            <div class="col-lg-2 col-12 text-center row-sm-center">
              <a href="{{ route ('asignacion',[$profile->id])}}" class="btn bg-theme-5 mt-0 mb-0"><i class="fa fa-users"></i></a>
              <a href="{{ route ('asignacion',[$profile->id])}}" class="btn bg-theme-5 mt-0 mb-0"><i class="fa fa-check"></i></a>
            </div>
          </div>
        </div>

        <div class="card-body collapse" id="{{$profile->title}}">
          <div class="row">
            <div class="col-lg-11">
              <div class="row">
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Tutor(es):</label>
                  <p class="card-text mb-2">{{$profile->professional_name}} {{$profile->professional_last_name_father}} {{$profile->professional_last_name_mother}}</p>
                </div>
                <div class="col-lg-6">
                  <label class="h6 card-subtitle">Area(s):</label>
                  <p class="card-text mb-2">{{$profile->area_name or 'Sin area'}}</p>
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
  {{$profiles->render()}}
</div>
  @include('profiles_assigned_professionals.modal_show_profile_assigned')
@endsection

@section('child_js')
  <script type="text/javascript" src="{{ url('asset/court_assignment/list_profiles.js')}}"></script>
  <script type="text/javascript" src="{{ url('js/search_bar.js')}}"></script>
@endsection
