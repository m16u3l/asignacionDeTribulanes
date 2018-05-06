@extends('layouts.base')

@section('head')
<title> Perfiles con tribunales asignados - Asignacion de tribunales UMSS</title>
@endsection

@section('child_css')
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">
  <div class="container" id="profile_list">
    <div class="row">
      <div class="offset-md-1 col-md-10">
        <div class="mt-4 col-lg-8 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('list_profile_finalized')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Titulo de perfil o tesista..." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
        <br>

        <div class="panel-body">
          {{$profiles->total()}} registros |
            pagina {{ $profiles->currentPage() }}
            de {{ $profiles->lastPage() }}
        </div>
        <br>

        @foreach($profiles as $profile)
        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-10" data-toggle="collapse" href="#{{$profile->title}}">
                  <h6 class="titleColor">{{$profile->title}}</h6>

                  <h6 class="h6 d-inline titleColor">Tesista:</h6>
                  @foreach($profile->students as $student)
                  <p class="mb-0 d-inline"> {{$student->student_name}}
                                            {{$student->student_last_name_father}}
                                            {{$student->student_last_name_mother}}
                  </p>
                  <!--separar esto dale una forma mas bonita-->
                  <p class="mb-0 d-inline"> {{$student->career}}
                  </p>
                  <br>
                  @endforeach
                </div>

              </div>
            </div>

            <div class="card-body collapse" id="{{$profile->title}}">
              <div class="row">
                <div class="col-lg-11">
                  <div class="row">
                    <div class="col-lg-6">
                      <label class="h6 card-subtitle titleColor">Tutor(es):</label>
                      @foreach($profile->tutors as $tutor)
                      <p class="mb-0 d-inline"> {{$tutor->professional_name}}
                                                {{$tutor->professional_last_name_father}}
                                                {{$tutor->professional_last_name_mother}}
                      </p>
                      <br>
                      @endforeach
                    </div>
                    <div class="col-lg-6">
                      <label class="h6 card-subtitle titleColor">Area(s):</label>
                      <p class="card-text mb-2">{{$profile->area->area_name}}</p>
                    </div>

                    <div class="col-lg-6">
                      <label class="h6 card-subtitle titleColor">Modalidad:</label>
                      <p class="card-text mb-2  ">{{$profile->degree_modality}}</p>
                    </div>
                    <div class="col">
                      <label class="h6 card-subtitle titleColor">Objetivo:</label>
                      <p class="card-text">{{$profile->objective}}</p>
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
  <br>
  <div class="row">
    <div class="col-md-4 col-xs-1"></div>
    <div class="col-md-5 col-xs-10 mipaginacion">
            {!! $profiles->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
</div>

@include('profile.modal_finalize_profile')

@endsection

@section('child_js')
<script type="text/javascript" src="{{ url('asset/profile/assigned_profile.js')}}"></script>
@endsection
