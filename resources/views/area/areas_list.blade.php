@extends('layouts.base')
@section('head')
<title>Asignacion de Tribunales UMSS</title>
@endsection

@section('child_css')
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="col">
  <div class="container" id="area_list">
    <div class="row">
      <div class="offset-md-1 col-md-10">
        <br>
        <br>
        <div class="row">
          <div class="offset-md-4 col-md-6">
            <a id="boton_register_area" href="#" class="btn btn-md btn-rounded btn-info" data-toggle="modal" data-target="#register_area_modal"
              >NUEVO AREA</a>
          </div>
        </div>
        <br>
        <div class="panel-body">
          {{$areas->total()}} registros |
            pagina {{ $areas->currentPage() }}
            de {{ $areas->lastPage() }}
        </div>
        <br>
        @if ( empty($areas[0]))
        <h5 class="h5 text-center">No se encontró areas</h5>
        @else @foreach($areas as $area)
        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$area->name}}">
                  <h6 class="titleColor">{{$area->name}}</h6>
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
            {!! $areas->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
</div>

@include('area.modal_register_area')
@endsection

@section('child_js')

<script type="text/javascript" src="{{ url('asset/area/register_area.js')}}"></script>
<script type="text/javascript" src="{{url('js/validation_andres.js')}}"></script>
<script type="text/javascript" src="{{url('js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.maskedinput.min.js')}}"></script>
@endsection
