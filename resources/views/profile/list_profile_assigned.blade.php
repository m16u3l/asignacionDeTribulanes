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
          <form class="navbar-form pull right" action="{{ route ('list_profile_asigned')}}" method="GET" role="search">
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
                <div class="col-lg-1 col-12 text-center row-sm-center">
                  <a id="boton_finalizar_tribunal" href="#" class="btn btn-rounded btn-danger remove-row" data-toggle="modal" data-target="#finalize_profile_modal"
                       data-finalize_profile="{{ $profile->id }}"
    	          	><i class="fa fa-check"></i></a>

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
                          <label class="h6 titleColor">Tutor(es):</label>
                        </div>
                        <div class="col-lg-9">
                          @foreach($profile->tutors as $tutor)
                          <p class="mb-0 d-inline"> {{$tutor->professional_name}}
                                                    {{$tutor->professional_last_name_father}}
                                                    {{$tutor->professional_last_name_mother}}
                          </p>
                          <br>
                          @endforeach
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6 titleColor">Area(s):</label>
                        </div>
                        <div class="col-lg-9">
                          <p class="mb-0 d-inline">{{$profile->area->area_name}}</p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6 titleColor">Modalidad:</label>
                        </div>
                        <div class="col-lg-9">
                          <p class="card-text mb-2">{{$profile->degree_modality}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="h6 titleColor">tribunal(es):</label>
                        </div>
                        <div class="col-lg-9">
                          @foreach($profile->assingements as $assingement)
                          <p class="mb-0 d-inline"> {{$assingement->professional_name}}
                                                    {{$assingement->professional_last_name_father}}
                                                    {{$assingement->professional_last_name_mother}}
                          </p>
                          <br>
                          @endforeach
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <label class="h6 card-subtitle titleColor">Objetivo:</label>
                      <br>
                      <p class="mb-0 d-inline">el principal objetivo de este perfil es non hacer nada en especifico porque todo es una verga</p>
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
