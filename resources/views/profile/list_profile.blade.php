@extends('layouts.base')
@section('head')
  PERFILES SIN TRIBUNAL ASIGNADO
@endsection

@section('child_css')
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">

  <div class="container" id="profile_list">
    <div class="row">
      <div class="offset-md-1 col-md-10">

        <center>
        <div class="mt-4 col-lg-8 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('list_profile')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Titulo de perfil o tesista..." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
        </center>
      
        <br> @if ( empty($profiles[0]))
        <h5 class="h5 text-center">No hay perfiles que requieran tribunales</h5>
        @else @foreach($profiles as $profile)

        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$profile->title}}">
                  <h6>{{$profile->title}}</h6>
                  <div class="row">
                    <div class="col-lg-12">
                      @foreach($profile->students as $student)
                      <div class="row">
                        <div class="col-lg-6">
                          <label class="h6 d-inline">Tesista:</label>
                          <p class="mb-0 d-inline"> {{$student->name}}
                                                    {{$student->last_name_father}}
                                                    {{$student->last_name_mother}}
                          </p>
                        </div>
                        <div class="col-lg-6">
                          <label class="h6 d-inline">Carrera:</label>
                          <p class="mb-0 d-inline"> {{$student->career}}
                          </p>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-lg-1 col-12 text-center row-sm-center">
                  <br>
                  <a href="#" class="btn btn-rounded bg-theme-5" data-toggle="modal" data-target="#letter_modal"
                onclick="omar({{$profile}},{{$profile->tutors}}, {{$profile->modality}})"
                ><i class="fa fa-users"></i></a>
                </div>
              </div>
            </div>

            <div class="card-body collapse" id="{{$profile->title}}">
              <div class="row">
                <div class="col-lg-11">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6">Area(s):</label>
                        </div>
                        <div class="col-lg-9">
                          @foreach($profile->areas as $area)
                          <p class="mb-0 d-inline"> {{$area->name}}
                          </p>
                          <br> @endforeach
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6">Modalidad:</label>
                        </div>
                        <div class="col-lg-9">
                          <p class="card-text mb-2">{{$profile->modality->name}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6">Tutor(es):</label>
                        </div>
                        <div class="col-lg-9">
                          @foreach($profile->tutors as $tutor)
                          <p class="mb-0 d-inline"> {{$tutor->name}}
                                                    {{$tutor->last_name_father}}
                                                    {{$tutor->last_name_mother}}
                          </p>
                          <br> @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="h6 card-subtitle">Objetivo:</label>
                      <br>
                      <p class="mb-0 d-inline">{{$profile->objective}}</p>
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
  <br>
  <div class="row">
    <div class="col-md-3 col-xs-1"></div>
    <div class="col-md-6 col-xs-10 mipaginacion">
      {!! $profiles->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
</div>


@include('profile.modal_register_letter')

<script type="text/javascript" src="{{url('asset/profile/letter.js')}}"></script>
@endsection

@section('child_js')
<script type="text/javascript" src="{{url('js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{url('asset/profile/letter.js')}}"></script>
@endsection
