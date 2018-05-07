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

            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-10" data-toggle="collapse" href="#{{$profile->title}}">
                  <div class="col">
                    <h4 class="h4 text-center titleColor">{{$profile->title}}</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body collapse" id="{{$profile->title}}">
              <div class="row">
                <div class="col-lg-12">
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
                          <label class="h6 titleColor">tribunales:</label>
                        </div>
                        <div class="col-lg-9">
                            @foreach($profile->students as $student)
                            <p class="card-text mb-2"> {{$student->student_name}}
                                                      {{$student->student_last_name_father}}
                                                      {{$student->student_last_name_mother}}
                            </p>
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

        <div class="col-lg-3 ml-0 ">
          <div class="card mt-3">
            <div class="card-header">
              <div class="col-lg-12" data-toggle="collapse" href="#{{$profile->title}}">
                <div class="col">
                  <h6 class="h6 text-center">PROFESIONALES NECESARIOS</h6>
                </div>
              </div>
            </div>
            <div class="card-body collapse" id="{{$profile->title}}">
              <div class="card-body collapse text-center h-17" id="{{$profile->title}}">
                <p class="h5" id="professional-number-label">0/3</p>
                <button class="btn bg-theme-4" onclick="increaseMaxProf()"><i class="fa fa-plus"></i></button>
                <button class="btn bg-theme-4" onclick="decreaseMaxProf()"><i class="fa fa-minus"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section id="selected-professional">
    <div class="container-fluid">
      <div class="row" id="selected-professional-list">
        <div class="col-12 mt-3">

          <h5 class="h5">
            PROFESIONALES SELECCIONADOS
          </h5>

        </div>


        <!--div class="col-md-4 " id="no-selection-message">
          <div class="card list-group-item list-group-item-action mb-0">
            <h6>Ningun profesional ha sido seleccionado</h6>
          </div>
        </div-->

       @foreach($professionals_asignados as $professional_asignado)

        <div class="col-md-4">
          <div class="card list-group-item list-group-item-action mb-2">
            <div class="card-header" data-toggle="collapse" href="#{{$professional_asignado->id}}" style = "overflow: hidden;
               white-space: nowrap;">
              <label class="h6 texto mb-0">Profesional:</label><br>
              <label class=" texto mb-0">{{$professional_asignado->professional_name}} {{$professional_asignado->professional_last_name_father}}</label>
            </div>

            <div class="card-body collapse" id="{{$professional_asignado->id}}">
              <div class="perfil col-12">
                <label class="h6 texto mb-0">Carga de perfiles:</label>
                <label class=" texto mb-0">{{$professional_asignado->count}} perfiles</label>
              </div>

              <div class="col-12 text-center">
                <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  <input type="hidden" name="profile_id" value="{{$profile->id}}">
                  <input type="hidden" name="professional_id" value="{{$professional_asignado->id}}  ">
                  <button type="submit" class="btn bg-theme-4" ><i class="fa fa-minus-circle"></i></button>
                </form>
              </div>
            </div>

          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>


  <hr class="my-2">

  <section id="professional-list">

    <div class="container-fluid" style=" height: 41%; overflow-y: auto;">
      <div class="row" id="area-related-list">
        <!-Buscador->
          <div class="mt-4 col-lg-8 col body-bg">
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
            <h5>No se encontró profesional/es</h5>
          </div>
          @else
          <div class="col-md-12">
            <h5>SELECCIONAR PROFESIONALES</h5>
            <label class="h6 ml-2">Profesionales relacionados con el area</label>
          </div>

          @if ( empty($professionals[0]))
          <div class="col-md-4">
            <div class="card list-group-item list-group-item-action mb-0">
              <h6>No hay ningun profesional pertinente al area</h6>
            </div>
          </div>
          @else @foreach($professionals as $professional)
          <div class="col-md-4 area-related-professional">
            <div class="card list-group-item list-group-item-action mb-3">

              <div class="col-12 text-justify">
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
            </div>
          </div>
          @endforeach @endif
        </div>
        <div class="row" id="not-related-list">
          <div class="col-md-12">
            <label class="h6 ml-2">Profesionales no relacionados con el area</label>
          </div>

          @if ( empty($allProfessionals[0]))
          <h6>No hay mas profesionales registrados</h6>
          @else @foreach($allProfessionals as $allprofessional)
          <div class="col-md-4 not-related-professional">
            <div class="card list-group-item list-group-item-action mb-3">

              <div class="col-12 text-justify">
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
                    <button type="submit" class="btn bg-theme-4" onclick="increaseSelectedProf()"><i class="fa fa-plus-circle"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          @endif
      </div>
    </div>
  </section>
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
            <button type="button" class="btn bg-theme-4" data-dismiss="modal" onClick="window.location.reload();">Registrar</button>
            <button type="button" class="btn bg-theme-5" data-dismiss="modal ">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('child_js')
  <script type="text/javascript" src="{{url('asset/profesional/selected_professional.js')}}"></script>
@endsection
