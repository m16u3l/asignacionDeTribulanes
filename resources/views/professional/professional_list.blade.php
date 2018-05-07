@extends('layouts.base')
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection

@section('child_css')
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">

  <div class="container" id="professional_list">
    <div class="row">
      <div class="offset-md-1 col-md-10">
      <h3>Lista de profesionales</h3>
        <!-Buscador->
        <div class="mt-4 col-lg-8 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('lista_profesionales')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Nombre profesional.." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
        <!-Fin de buscador->
        <br>
        <div class="panel-body">
          {{$professionals->total()}} registros |
            pagina {{ $professionals->currentPage() }}
            de {{ $professionals->lastPage() }}
        </div>
        <br>
        @if ( empty($professionals[0]))
        <h5 class="h5 text-center">No se encontró profesionales</h5>
        @else @foreach($professionals as $professional)

        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$professional->professional_name}}">
                  <h6 class="titleColor">{{$professional->professional_name}} {{$professional->professional_last_name_father}} {{$professional->professional_last_name_mother}}</h6>
                </div>
              </div>
            </div>

            <div class="card-body collapse" id="{{$professional->professional_name}}">
              <div class="row">
                <div class="col-lg-11">
                          <label class="h6 titleColor">Areas de interes:</label>
                          
            <!-- OSCAR ACA HAZ TU MAGIA-->
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
            {!! $professionals->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
</div>
@endsection

@section('child_js')

@endsection
