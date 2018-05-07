@extends('layouts.base') 
@section('head')
<title>{{$profile->title}} - Asignacion de Tribunales UMSS</title>
@endsection
 
@section('content')
<div class="col">
  <section id="profile-info">
    <div class="container">
      <div class="row">

        <div class="col-lg-9">
          <div class="card mt-3">

            <div class="card-header clearfix py-1">
              <div class="row">
                <div class="col" data-toggle="collapse" href="#profile">
                  <h5 class="h5 text-center">{{$profile->title}}</h5>


                </div>
              </div>
            </div>

            <div class="card-body collapse py-2" id="profile">
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
                        <div class="col-lg-4">
                          <label class="h6 titleColor">tribunal(es):</label>
                        </div>
                        <div class="col-lg-8">
                            @foreach($profile->students as $student)
                            <p class="mb-0 d-inline"> {{$student->student_name}}
                                                      {{$student->student_last_name_father}}
                                                      {{$student->student_last_name_mother}}
                            </p>
                          <br>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  <div class="container-fluid">
    <div class="row">

      <div class="col-md-4 mt-3">
        <section id="selected-professional">
          <h5 class="h5">
            PROFESIONALES SELECCIONADOS
          </h5>
          <label class="h6 d-inline">Necesarios para este perfil: </label>
          <h6 class="h6 mb-4 d-inline" id="professional-number-label">3</h6>
          <button class="btn bg-theme-4 d-inline" onclick="increaseMaxProf()"><i class="fa fa-plus"></i></button>
          <button class="btn bg-theme-4 d-inline" onclick="decreaseMaxProf()"><i class="fa fa-minus"></i></button>
          <div class="row mt-3" id="selected-professional-list">
            @foreach($professionals_asignados as $professional_asignado)


            <div class="card list-group-item list-group-item-action mb-2">
              <div class="card-header" data-toggle="collapse" href="#{{$professional_asignado->id}}" style="overflow: hidden;
               white-space: nowrap;">
                <label class="h6 texto mb-0">Profesional:</label>
                <label class=" texto mb-0">{{$professional_asignado->professional_name}} {{$professional_asignado->professional_last_name_father}}</label>
              </div>

              <div class="card-body collapse" id="{{$professional_asignado->id}}">
                <div class="perfil col-12">
                  <label class="h6 texto mb-0">Carga de perfiles:</label>
                  <label class=" texto mb-0">{{$professional_asignado->count}} perfiles</label>
                </div>
                <div class="perfil col-12 mb-0">
                  <label class="h6 texto">Areas de interes:</label>
                  <label class=" texto">Ninguna</label>
                </div>
                <div class="col-12 text-center">
                  <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <input type="hidden" name="profile_id" value="{{$profile->id}}">
                    <input type="hidden" name="professional_id" value="{{$professional_asignado->id}}  ">

                    <button type="submit" class="btn bg-theme-4"><i class="fa fa-minus-circle"></i></button>

                  </form>
                </div>
              </div>

            </div>


            @endforeach
          </div>
        </section>
      </div>


      <!--div class="col-md-4 " id="no-selection-message">
          <div class="card list-group-item list-group-item-action mb-0">
            <h6>Ningun profesional ha sido seleccionado</h6>
          </div>
        </div-->


      <div class="mt-3 col-md-8 border-left">
        <section id="professional-list">



          <h5>SELECCIONAR PROFESIONALES</h5>
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
              <label class="h6 nav-link active show" data-toggle="tab" href="#area-related">Relacionados con el area</label>
            </li>
            <li class="nav-item">
              <label class="h6 nav-link" data-toggle="tab" href="#not-related">No relacionados con el area</label>
            </li>

          </ul>

          <!-Buscador->
          <div class="col-md-8 col text-center">
            <form class="navbar-form pull right" action="{{ route ('asignacion',[$profile->id]) }}" method="GET" role="search">
              <div class="panel-body">
                <div class="input-group input-group">
                  <input type="text" class="form-control" name="name" placeholder="Buscar profesional..." aria-describedby="basic-addon2">
                  <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
                </div>
              </div>
            </form>
          </div>
          <!-Fin de buscador->
          @if ( empty($allProfessionals[0]))
          <div class="col-md-12">
            <h6>No se encontró profesionales</h6>
          </div>
          @else
          <div class="tab-content">
            <div id="area-related" class="container tab-pane active">
              @if ( empty($professionals[0]))
              <div class="col-md-6">
                <div class="card list-group-item list-group-item-action mb-0">
                  <h6>No hay ningun profesional pertinente al area</h6>
                </div>
              </div>
              @else
              <div class="row" id="area-related-list">
                @foreach($professionals as $professional)
                <div class="col-md-6 area-related-professional" onclick="addProfessional(this)">
                  <div class="card list-group-item list-group-item-action mb-3">

                    <div class="col-11 text-justify">
                      <div class="row">
                        <div class="perfil col-12">
                          <label class="h6 texto mb-0">Profesional:</label>
                          <label class=" texto mb-0">{{$professional->professional_name}}  {{$professional->professional_last_name_father}} {{$professional->professional_last_name_mother}}</label><br>
                        </div>
                        <div class="perfil col-12">
                          <label class="h6 texto mb-0">Carga de perfiles:</label>
                          <label class=" texto mb-0">{{$professional->count}} perfiles</label>
                        </div>
                        <div class="perfil col-12 mb-0">
                          <label class="h6 texto">Areas de interes:</label>
                          <label class=" texto">Ninguna</label>
                        </div>
                      </div>
                      <div class="col-12 text-center">
                        <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                          <input type="hidden" name="profile_id" value="{{$profile->id}}">
                          <input type="hidden" name="professional_id" value="{{$professional->id}}">

                          <button type="submit" class="btn bg-theme-4" onclick="increaseSelectedProf()"><i class="fa fa-plus-circle"></i></button>

                        </form>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <button class="btn bg-theme-4">
                          <i class="fa fa-plus-circle"></i>
                      </button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div> @endif
            </div>
            <div id="not-related" class="container tab-pane fade">
              @if ( empty($allProfessionals[0]))
              <h6>No hay mas profesionales registrados</h6>

              @else
              <div class="row" id="not-related-list">
                @foreach($allProfessionals as $allprofessional)
                <div class="col-md-6 not-related-professional" onclick="addProfessional(this)">
                  <div class="card list-group-item list-group-item-action mb-3">
                    <div class="row">
                      <div class="col-10 pr-1">
                        <div class="row">
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Profesional:</label>
                            <label class=" texto mb-0">{{$allprofessional->professional_name}}  {{$allprofessional->professional_last_name_father}} {{$allprofessional->professional_last_name_mother}}</label><br>
                          </div>
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Carga de perfiles:</label>
                            <label class=" texto mb-0">{{$allprofessional->count}} perfiles</label>
                          </div>
                          <div class="perfil col-12 mb-0">
                            <label class="h6 texto">Areas de interes:</label>
                            <label class=" texto">Ninguna</label>
                          </div>
                        </div>
                        <div class="col-12 text-center">
                          <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input type="hidden" name="profile_id" value="{{$profile->id}}">
                            <input type="hidden" name="professional_id" value="{{$allprofessional->id}}">
                            <button type="submit" class="btn bg-theme-4 register_prof" onclick="increaseSelectedProf()"><i class="fa fa-plus-circle"></i></button>
                          </form>
                        </div>
                      </div>
                      <div class="col-2 pl-0 ">
                        <button class="btn bg-theme-4 ml-1" style="position: relative; top: 30%;">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div> @endif @endif
            </div>
          </div>


        </section>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">

      <button id="register" type="button" class="btn bg-theme-4 float-right" data-toggle="modal" data-target="#myModal">ASIGNAR TRIBUNALES</button>

    </div>
  </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">REGISTRO DE TRIBUNALES</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>¿Esta seguro de que desea registrar los tribunales seleccionados? </p>
          <div class="modal-footer">
            <button type="button" class="btn bg-theme-4" data-dismiss="modal" onClick="registerProf()">Registrar</button>
            <button type="button" class="btn bg-theme-5" data-dismiss="modal ">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
 
@section('child_js')
  <script type="text/javascript" src="{{url('js/selected_professional.js')}}"></script>
@endsection