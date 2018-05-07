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
        <h3>Lista de areas</h3>
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
                <div class="col-lg-11" data-toggle="collapse" href="#{{$area->area_name}}">
                  <h6 class="titleColor">{{$area->area_name}}</h6>
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
@endsection

@section('child_js')

@endsection
