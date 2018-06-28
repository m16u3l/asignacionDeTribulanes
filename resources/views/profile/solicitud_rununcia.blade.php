@extends('layouts.base') 
@section('head')
<title>{{$profile->title}} - Asignacion de Tribunales UMSS</title>
@endsection
 
@section('child_css')
<link href="{{ url('css/menu_professional.css')}}" rel="stylesheet" type="text/css">
@endsection
 
@section('content')
<div class="col" onload="addPages();">
  <section id="profile-info">
    <div class="container">
      <div class="row">

        <div class="col-lg-10">
          <div class="card mt-3">

            <div class="card-header clearfix py-1">
              <div class="row">
                <div class="col" data-toggle="collapse" href="#{{$profile->title}}">
                  <h5 class="h5 text-center">{{$profile->title}}</h5>
                </div>
              </div>
            </div>


            <div class="card-body collapse py-2" id="{{$profile->title}}">
              <div class="row">
                <div class="col-lg-11">
                  <div class="row">
                    <div class="col-lg-4">
                      <label class="h6 card-subtitle">Tutor(es):</label> @foreach($profile->tutors as $tutor)
                      <p class="mb-2 card-text"> {{$tutor->name}} {{$tutor->last_name_father}} {{$tutor->last_name_mother}}
                      </p>
                      @endforeach
                    </div>
                    <div class="col-lg-4">
                      <label class="h6 card-subtitle">Area(s):</label> @foreach($profile->areas as $area)
                      <p class="mb-2 card-text"> {{$area->name}}
                      </p>
                      @endforeach
                    </div>

                    <div class="col-lg-4">
                      <label class="h6 card-subtitle">Modalidad:</label>
                      <p class="card-text mb-2  ">{{$profile->modality->name}}</p>
                    </div>

                    <div class="col-lg-4">
                      <h6 class="h6 d-inline">Tesista:</h6>

                      @foreach($profile->students as $student)
                      <p class="card-text mb-2"> {{$student->name}} {{$student->last_name_father}} {{$student->last_name_mother}}
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
  </section>

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-4 mt-3">
        <section id="selected-professional">
          <h5 class="h5 d-inline">
            PROFESIONALES ASIGNADOS
          </h5>
          <div class="col-lg-2 d-inline">
            <button id="register" type="button" class="btn bg-theme-4 py-1" onclick="verify();"><i class="fa fa-save"></i></button>
          </div>
          <input type="hidden" name="count1" id="count1" value="{{$profile->count}}">
          <div class="row mt-3" id="selected-professional-list">
            @if ( empty($courts[0]))
            <div class="col-md-12" id="no-selection-message">
              <div class="card list-group-item list-group-item-action mb-0">
                <h6>Ningun profesional ha sido seleccionado</h6>
              </div>
            </div>
            @else @foreach($courts as $court)
            <div class="col-md-12 area-related-professional select-professional">
              <div class="card list-group-item list-group-item-action mb-3">
                <div class="row">
                  <div class="col-10 pr-1">
                    <div class="row">
                      <div class="perfil col-12">
                        <label class="h6 texto mb-0">Profesional:</label>
                        <label class="texto mb-0 name-professional">{{$court->name}}
                                                                    {{$court->last_name_father}}
                                                                    {{$court->last_name_mother}}</label><br>
                      </div>
                      <div class="perfil col-12">
                        <label class="h6 texto mb-0">Carga de perfiles:</label>
                        <label class=" texto mb-0">{{$court->count}} perfiles</label>
                      </div>

                    </div>

                  </div>
                  <div class="col-md-2 d-none check-mark">
                    <button class="btn bg-theme-4"><i class="fa fa-check"></i></button>
                    <form action="{{$url}}" method="POST" class="py-0 mb-0 post-data">
                      <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                      <input class="profile_id" type="hidden" name="profile_id" value="{{$profile->id}}">
                      <input class="court_id" type="hidden" name="court_id" value="{{$court->id}}">
                    </form>
                  </div>
                </div>
              </div>

            </div>
            @endforeach @endif
            <h6 class="h6">
              SUSTITUIR POR:
            </h6>
          </div>

        </section>

      </div>


      <div class="mt-3 col-md-8">
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
          <!--
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
        -->

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
                <div class="col-md-8">
                  <input type="text" id="mySearch">
                  <button class="btn bg-theme-4" onclick="searchBar();">
                        Buscar
                      </button>
                </div>
                <div class="col-md-6 d-none" id="related-not-found">
                  <div class="card list-group-item list-group-item-action mb-0">
                    <h6>No se encontraron coincidencias</h6>
                  </div>
                </div>
                @foreach($professionals as $professional)
                <div class="col-md-6 area-related-professional related-element" onclick="addProfessional(this)">
                  <div class="card list-group-item list-group-item-action mb-3">
                    <div class="row">
                      <div class="col-10 pr-1">
                        <div class="row">
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Profesional:</label>
                            <label class="texto mb-0 name-professional">{{$professional->name}}
                                                                        {{$professional->last_name_father}}
                                                                        {{$professional->last_name_mother}}</label><br>
                          </div>
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Carga de perfiles:</label>
                            <label class=" texto mb-0">{{$professional->count}} perfiles</label>
                          </div>

                        </div>
                        <div class="col-12 text-center">
                          <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                            <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input class="profile_id" type="hidden" name="profile_id" value="{{$profile->id}}">
                            <input class="professional_id" type="hidden" name="professional_id" value="{{$professional->id}}">
                            <button type="submit" class="btn bg-theme-4 d-none register_prof"><i class="fa fa-plus-circle"></i></button>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                @endforeach

              </div> @endif

              <div class="col-md-12">
                <ul id="related-pagination" class="pagination">

                </ul>
              </div>
            </div>

            <div id="not-related" class="container tab-pane fade">

              @if ( empty($allProfessionals[0]))
              <h6>No hay mas profesionales registrados</h6>

              @else
              <div class="row" id="not-related-list">
                <div class="col-md-8">
                  <input type="text" id="notRelatedMyInput">
                  <button class="btn bg-theme-4" onclick="notRelatedSearchBar();">
                        Buscar
                      </button>
                </div>
                <div class="col-md-6 d-none" id="not-related-not-found">
                  <div class="card list-group-item list-group-item-action mb-0">
                    <h6>No se encontraron coincidencias</h6>
                  </div>
                </div>
                @foreach($allProfessionals as $allprofessional)
                <div class="col-md-6 not-related-professional not-related-element" onclick="addProfessional(this)">
                  <div class="card list-group-item list-group-item-action mb-3">
                    <div class="row">
                      <div class="col-10 pr-1">
                        <div class="row">
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Profesional:</label>
                            <label class=" texto mb-0 name-professional">
                              {{$allprofessional->name}}
                              {{$allprofessional->last_name_father}}
                              {{$allprofessional->last_name_mother}}
                            </label><br>
                          </div>
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Carga de perfiles:</label>
                            <label class=" texto mb-0">{{$allprofessional->count}} perfiles</label>
                          </div>

                        </div>
                        <div class="col-12 text-center">
                          <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                            <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input class="profile_id" type="hidden" name="profile_id" value="{{$profile->id}}">
                            <input class="professional_id" type="hidden" name="professional_id" value="{{$allprofessional->id}}">
                            <button type="submit" class="btn bg-theme-4 d-none register_prof"><i class="fa fa-plus-circle"></i></button>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                @endforeach

              </div> @endif
              <div class="col-md-12">
                <ul id="not-related-pagination" class="pagination">

                </ul>
              </div>
            </div>
          </div>



        </section>
      </div>
    </div>



    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">REGISTRAR CAMBIO DE PROFESIONALES</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Escriba el motivo de renuncia </p>
            <form action="" class="form">
              <div class="form-group">
                <input type="text" class="form-control" id="description-text">
              </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn bg-theme-4 register-button" data-dismiss="modal" onClick="registerProf();">Registrar</button>
              <button type="button" class="btn bg-theme-5" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
 
@section('child_js')

  <script type="text/javascript" src="{{url('asset/professional/professional_change.js')}}"></script>
@endsection