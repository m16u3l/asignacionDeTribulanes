@extends('layouts.base')
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection

@section('child_css')
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">

  <div class="container" id="profile_list">
    <div class="row">
      <div class="offset-md-1 col-md-10">
        <br>
        <h3>Lista de perfiles</h3>
        <!-Buscador->
        <div class="mt-4 col-lg-8 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('lista_perfiles')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Titulo de perfil o tesista..." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
        <!-Fin de buscador->
        <br>
        <div class="panel-body">
          {{$profiles->total()}} registros | pagina {{ $profiles->currentPage() }} de {{ $profiles->lastPage() }}
        </div>
        <br> @if ( empty($profiles[0]))
        <h5 class="h5 text-center">No se encontró perfiles</h5>
        @else @foreach($profiles as $profile)

        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$profile->title}}">
                  <h6 class="h6">{{$profile->title}}</h6>
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
                          <p class="mb-0 d-inline">falta area</p>
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
@endsection

@section('child_js')
@endsection
