@extends('layouts.base') 
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection
 
@section('child_css')
<link href="{{ url('css/menu_professional.css')}}" rel="stylesheet" type="text/css">
@endsection
 
@section('content')
<div class="col">
  <h3>Lista de profesionales</h3>
          <!-Buscador->
          <div class="col-md-8 col text-center">
            <form class="navbar-form pull right" action="{{ route ('lista_profesionales') }}" method="GET" role="search">
              <div class="panel-body">
                <div class="input-group input-group">
                  <input type="text" class="form-control" name="name" placeholder="Buscar profesional..." aria-describedby="basic-addon2">
                  <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
                </div>
              </div>
            </form>
          </div>
          <!-Fin de buscador->
          @if ( empty($professionals[0]))
          <div class="col-md-12">
            <h6>No se encontró profesionales</h6>
          </div>
          @else
          <div class="tab-content">
            <div id="area-related" class="container tab-pane active">
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
                          <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                          <input type="hidden" name="professional_id" value="{{$professional->id}}">

                        </form>
                      </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                  </div>
                </div>
                @endforeach
              </div> @endif
            </div>
            <div id="not-related" class="container tab-pane fade">
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('child_js')
@endsection