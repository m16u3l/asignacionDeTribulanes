
 $(document).ready(  function() {

     var bandera = false;
     $('#add').on('click', function() {
       $("#add").html( 'QUITAR CAMPO');
       if(!bandera){

       $('.add_new_field').append('<div class="new_field form-group form-inline"><input type="text" class=" form-control " > <button  type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="mas fa fa-plus-circle"></i></button></div>');
       bandera = true;
     }else{
        $("#add").html( 'NUEVO TRIBUNAL');
        $('.new_field').remove();
        bandera = false;
     }
     })



});
