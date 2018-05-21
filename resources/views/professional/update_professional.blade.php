@extends('layouts.base')
@section('head')
  <title>Actualizar profesional</title>
@endsection

@section('child_css')

@endsection

@section('content')
  <div class="col" onload="addPages();">
    <br/>
    <br/>
    <div class="container">
      <form action="" method="POST" id="update">
	{{ csrf_field() }}
	<div class="row">
	  <div class="offset-lg-2 col-lg-4">
	    <label for="">C.I</label>
	    <input class="form-control" name="ci" id="ci" type="text" value=""/>
	  </div>
	  <div class="col-lg-4">
	    <label for="">COD SIS</label>
	    <input class="form-control" name="cod_sis" id="cod_sis" type="text" value=""/>
	  </div>
	</div>
	<div class="row">
	  <div class="offset-lg-2 col-lg-8">
	    <label for="">Nombre</label>
	    <input class="form-control" name="name" id="name" type="text" value=""/>
	  </div>
	</div>
	<div class="row">
	  <div class="offset-lg-2 col-lg-8">
	    <label for="">Apellido paterno</label>
	    <input class="form-control" name="last_name_father" id="last_name_father" type="text" value=""/>
	  </div>
	</div>
	<div class="row">
	  <div class="offset-lg-2 col-lg-8">
	    <label for="">Apellido materno</label>
	    <input class="form-control" name="last_name_mother" id="last_name_mother" type="text" value=""/>
	  </div>
	</div>
	<div class="row">
	  <div class="offset-lg-2 col-lg-4">
	    <label for="">Titulo</label>
	    <input class="form-control" name="degree" id="degree" type="text" value=""/>
	  </div>
	  <div class="col-lg-4">
	    <label for="">Carga Horaria</label>
	    <input class="form-control" name="workload" id="workload" type="text" value=""/>
	  </div>
	</div>
	<br/>
	<button class="row offset-lg-2 col-lg-2 btn btn-primary update" type="submit"> Actualizar</button>
      </form>
    </div>
  </div>

@endsection
@section('child_js')
  <script type="text/javascript">
   $(document).ready(function(){
       /* Validations */
       $("#name").addClass("input-text");
       $("#last_name_father").addClass("input-text");
       $("#last_name_mother").addClass("input-text");
       $("#ci").addClass("input-number");
       $("#cod_sis").addClass("input-number");
       $("#degree").addClass("input-number");
       /* Load */
       $("#name").val('{{$professional_update->name}}');
       $("#last_name_father").val('{{$professional_update->last_name_father}}');
       $("#last_name_mother").val('{{$professional_update->last_name_mother}}');
       $("#ci").val("{{$professional_update->ci or "0"}}");
       $("#cod_sis").val("{{$professional_update->cod_sis or "0"}}");
       $("#degree").val('{{$professional_update->degree->id}}');
       $("#workload").val("{{$professional_update->workload}}");
   });
  </script>

  <!-- Update -->
  <script type="text/javascript">
   $(document).ready(function(){
       /* Registration */
       $(".update").on('click', function(e){
	   e.preventDefault();
	   form = $("#update");
	   $.ajax({
	       content_type: "application/json",
	       type: "POST",
	       data: form.serialize(),
	       success: function(response){
		   if(response.status){
		       swal("Actualizacion exitosa!","En: " + response.name, "success");
		       $('.swal2-confirm').on('click', function (event2) {
			   event2.preventDefault();
			   location.reload();
		       })
		   }
		   else{
		       swal({
			   position: 'center',
			   type: 'error',
			   title: 'Error, campos por llenar',
			   showConfirmButton: false,
			   timer: 1500
		       });   
		   }
	       }
	   });
       });
   });
  </script>
  <script type="text/javascript" src="{{url('js/validation_andres.js')}}"></script>
  <script type="text/javascript" src="{{url('js/sweetalert.js')}}"></script>
  <script type="text/javascript" src="{{url('js/jquery.maskedinput.min.js')}}"></script>
@endsection
