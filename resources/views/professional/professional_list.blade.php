@extends('layouts.base')
@section('head')
  LISTA DE PROFESIONALES
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
        {{--Register professioanl--}}
        
         <center>
           <a id="boton_register_professional" href="#" class="btn btn-md btn-rounded btn-info" data-toggle="modal" data-target="#register_professinal_modal"
              >NUEVO PROFESIONAL</a>

            <div class=" mt-4 col-md-10 col body-bg">
          <form class="navbar-form pull right" action="{{ route ('lista_profesionales')}}" method="GET" role="search">
            <div class="panel-body">
              <div class="input-group input-group">
                <input type="text" class="form-control" name="name" placeholder="Nombre profesional.." aria-describedby="basic-addon2">
                <span class="input-group-append"><button type="submit" class="btn bg-theme-1 input-group-append">Buscar</button></span>
              </div>
            </div>
          </form>
        </div>
         </center>

        <br>
        @if ( empty($professionals[0]))
        <h5 class="h5 text-center">No se encontró profesionales</h5>
        @else
        {{--List professionals--}}
        @foreach($professionals as $professional)

        <div class="card list-group-item-action element-bg mb-1">
          <div class="card list-group-item-action">
            <div class="card-header clearfix">
              <div class="row">
                <div class="col-lg-11" data-toggle="collapse" href="#{{$professional->name}}">
                  <h6 class="h6">{{$professional->name}} {{$professional->last_name_father}} {{$professional->last_name_mother}}</h6>
                </div>
                <div class="col-lg-1 col-12 text-center row-sm-center">
                  <a href="#" class="btn btn-rounded btn-success modal_update_professional" data-toggle="modal" data-target="#update_professinal_modal"
                    data-id="{{ $professional->id }}"
                    data-name="{{ $professional->name }}"
                    data-last_name_father="{{ $professional->last_name_father }}"
                    data-last_name_mother="{{ $professional->last_name_mother }}"
                    data-ci="{{ $professional->ci }}"
                    data-cod_sis="{{ $professional->cod_sis }}"
                    data-email="{{ $professional->contact->email or ""}}"
                    data-phone="{{ $professional->contact->phone or ""}}"
                    data-address="{{ $professional->contact->address or ""}}"
                    data-workload="{{ $professional->workload }}"
                    data-degree_id="{{ $professional->degree_id }}"
                  ><i class="fa fa-edit"></i></a>
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
        @endforeach
        @endif
      </div>
    </div>
  </div>
  <br>
  {{--Pagination--}}
  <div class="row">
    <div class="col-md-3 col-xs-1"></div>
    <div class="col-md-6 col-xs-10 mipaginacion">
      {!! $professionals->render() !!}
    </div>
    <div class="col-md-3 col-xs-1"></div>
  </div>
</div>

@include('professional.modal_register_professional')
@include('professional.modal_update_professional')

@endsection

@section('child_js')
  <script type="text/javascript" src="{{ url('asset/professional/update_professional.js')}}"></script>
  <script type="text/javascript" src="{{ url('asset/professional/register_professional.js')}}"></script>
  <script type="text/javascript" src="{{url('js/validation_andres.js')}}"></script>
  <script type="text/javascript" src="{{url('js/sweetalert.js')}}"></script>
  <script type="text/javascript" src="{{url('js/jquery.maskedinput.min.js')}}"></script>
@endsection
