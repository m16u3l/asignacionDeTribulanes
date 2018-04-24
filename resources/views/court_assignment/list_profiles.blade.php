@extends('layouts.base')
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection

@section('child_css')
@endsection

@section('content')
<div class="col">

  <div class="container" id="profile_list">
    <div class="row">
      <div class="offset-md-1 col-md-9">
        <!-Buscador->
        <div class="mt-4 col-lg-8 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('list_profiles')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Titulo de perfil o tesista..." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
        <!-Fin de buscador->
        @if ( empty($profiles[0]))
        <h5 class="h5 text-center">No hay ningun perfil disponible</h5>
        @else @foreach($profiles as $profile)

        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$profile->title}}">
                  <h6 class="">{{$profile->title}}</h6>

                  <h6 class="h6 d-inline">Tesista:</h6>
                  <p class="mb-0 d-inline"> {{$profile->student_name}} {{$profile->student_last_name_father}} {{$profile->student_last_name_mother}}</p>
                </div>
                <div class="col-lg-1 col-12 text-center row-sm-center">
                  <a href="{{ route ('asignacion',[$profile->id])}}" class="btn bg-theme-5 "><i class="fa fa-users"></i></a>
                </div>
                <!--div class="col-lg-1 col-6 text-center">
                  <button v-on:"click.stop" type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-title="{{$profile->title}}"
                    data-student_name="{{$profile->student_name}}" data-student_last_name_father="{{$profile->student_last_name_father}}"
                    data-student_last_name_mother="{{$profile->student_last_name_mother}}" data-professional_name="{{$profile->professional_name}}"
                    data-professional_last_name_father="{{$profile->professional_last_name_father}}" data-professional_last_name_mother="{{$profile->professional_last_name_mother}}"
                    data-title_modality="{{$profile->degree_modality}}" data-objective="{{$profile->objective}}" data-area="{{$profile->area->name or 'Sin area'}}"><i class="fa fa-info "></i>

                  </button>
                </div-->
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
                      <p class="card-text mb-2">{{$profile->area_name}}</p>
                    </div>
                    <div class="col-lg-6">
                      <label class="h6 card-subtitle">Carrera:</label>
                      <p class="card-text">Informatica</p>
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

        @endforeach @endif
      </div>
    </div>
  </div>

  @include('court_assignment.modal_show_profile')
@endsection

@section('child_js')
  <script type="text/javascript" src="{{ url('asset/court_assignment/list_profiles.js')}}"></script>
  <script type="text/javascript" src="{{ url('js/search_bar.js')}}"></script>
@endsection
