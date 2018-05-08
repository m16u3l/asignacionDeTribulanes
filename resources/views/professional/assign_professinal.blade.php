@extends('layouts.base')
@section('head')
<title>{{$profile->title}} - Asignacion de Tribunales UMSS</title>
@endsection

@section('child_css')
<link href="{{ url('css/menu_professional.css')}}" rel="stylesheet" type="text/css">
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="col">
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
                      <p class="mb-2 card-text"> {{$tutor->professional_name}} {{$tutor->professional_last_name_father}} {{$tutor->professional_last_name_mother}}
                      </p>
                      @endforeach
                    </div>
                    <div class="col-lg-4">
                      <label class="h6 card-subtitle">Area(s):</label>
                      <p class="card-text mb-2">{{$profile->area->area_name or 'Sin area'}}</p>
                    </div>

                    <div class="col-lg-4">
                      <label class="h6 card-subtitle">Modalidad:</label>
                      <p class="card-text mb-2  ">{{$profile->degree_modality}}</p>
                    </div>

                    <div class="col-lg-4">
                      <h6 class="h6 d-inline">Tesista:</h6>

                      @foreach($profile->students as $student)
                      <p class="card-text mb-2"> {{$student->student_name}} {{$student->student_last_name_father}} {{$student->student_last_name_mother}}
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
          <h5 class="h5">
            PROFESIONALES SELECCIONADOS
          </h5>

          <div class="row">
            <div class="col-lg-7">
              <label class="h6 d-inline">Necesarios para este perfil: </label>
            </div>
            <div class="col-lg-1">
              <h6 class="h6 mb-4 d-inline" id="professional-number-label">3</h6>
            </div>
            <div class="col-lg-1">
              <button class="btn bg-theme-4 p-1" onclick="increaseMaxProf()"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-lg-1">
              <button class="btn bg-theme-4 p-1" onclick="decreaseMaxProf()"><i class="fa fa-minus"></i></button>
            </div>
            <div class="col-lg-2">
              <button id="register" type="button" class="btn bg-theme-4 py-1" data-toggle="modal" data-target="#myModal"><i class="fa fa-save"></i></button>
            </div>
          </div>


          <div class="row mt-3" id="selected-professional-list">

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

          
          @if ( empty($allProfessionals[0]))
          <div class="col-md-12">
            <h6>No se encontró profesionales</h6>
          </div>
          @else
          <div class="tab-content">
            <div id="area-related" class="container tab-pane active">
            <div class="panel-body">
          {{$professionals->total()}} registros |
            pagina {{ $professionals->currentPage() }}
            de {{ $professionals->lastPage() }}
        </div>

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
                    <div class="row">
                      <div class="col-10 pr-1">
                        <div class="row">
                          <div class="perfil col-12">
                            <label class="h6 texto mb-0">Profesional:</label>
                            <label class=" texto mb-0">{{$professional->professional_name}}  {{$professional->professional_last_name_father}} {{$professional->professional_last_name_mother}}</label><br>
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
                            <button type="submit" class="btn bg-theme-4 d-none register_prof" onclick="increaseSelectedProf()"><i class="fa fa-plus-circle"></i></button>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                @endforeach
                
              </div> @endif
              <div class="row">
    <div class="col-md-3 col-xs-1"></div>
    <div class="col-md-6 col-xs-10 mipaginacion">
            {!! $professionals->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
            </div>
            <div id="not-related" class="container tab-pane fade">
            <div class="panel-body">
          {{$allProfessionals->total()}} registros |
            pagina {{ $allProfessionals->currentPage() }}
            de {{ $allProfessionals->lastPage() }}
        </div>
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

                        </div>
                        <div class="col-12 text-center">
                          <form id="asignar" action="{{$url}}" method="POST" class="py-0 mb-0">
                            <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input class="profile_id" type="hidden" name="profile_id" value="{{$profile->id}}">
                            <input class="professional_id" type="hidden" name="professional_id" value="{{$allprofessional->id}}">
                            <button type="submit" class="btn bg-theme-4 d-none register_prof" onclick="increaseSelectedProf()"><i class="fa fa-plus-circle"></i></button>
                          </form>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                @endforeach
               

              </div> @endif @endif
              <div class="row">
    <div class="col-md-3 col-xs-1"></div>
    <div class="col-md-6 col-xs-10 mipaginacion">
            {!! $allProfessionals->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
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
            <h5 class="modal-title">REGISTRO DE TRIBUNALES</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro de que desea registrar los tribunales seleccionados? </p>
            <div class="modal-footer">
              <button type="button" class="btn bg-theme-4 register-button" data-dismiss="modal" onClick="registerProf();">Registrar</button>
              <button type="button" class="btn bg-theme-5" data-dismiss="modal ">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection

@section('child_js')
  <script type="text/javascript" src="{{url('asset/professional/selected_professional.js')}}"></script>
@endsection
