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
        <br>
        <br>

        <div class="row">
          <div class="offset-md-4 col-md-6">
            <a id="boton_register_professional" href="#" class="btn btn-md btn-rounded btn-info" data-toggle="modal" data-target="#register_professinal_modal"
              >NUEVO PROFESIONAL</a>

          </div>
        </div>

        <div class=" mt-4 col-md-12 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('lista_profesionales')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Nombre profesional.." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>

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
                <div class="col-lg-11" data-toggle="collapse" href="#{{$professional->name}}">
                  <h6 class="titleColor">{{$professional->name}} {{$professional->last_name_father}} {{$professional->last_name_mother}}</h6>
                </div>
              </div>
            </div>

            <div class="card-body collapse" id="{{$professional->name}}">
              <div class="row">
                <div class="col-lg-11">
                  <label class="h6 titleColor">Areas de interes:</label>
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

@include('professional.modal_register_professional')


@endsection

@section('child_js')
<script type="text/javascript" src="{{ url('asset/professional/register_professional.js')}}"></script>
<script type="text/javascript" src="{{url('js/validation_andres.js')}}"></script>
<script type="text/javascript" src="{{url('js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.maskedinput.min.js')}}"></script>
@endsection
