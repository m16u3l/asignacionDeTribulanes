
 $(document).ready(  function() {

     var bandera = false;
     $('#add').on('click', function() {
       $("#add").html( 'QUITAR CAMPO');
       if(!bandera){

       $('.prueba').append('<div class="algo form-group form-inline"><input type="text" class=" form-control " > <button  type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="mas fa fa-plus-circle"></i></button></div>');
       bandera = true;
     }else{
        $("#add").html( 'NUEVO TRIBUNAL');
        $('.algo').remove();
        bandera = false;
     }
     })



});
