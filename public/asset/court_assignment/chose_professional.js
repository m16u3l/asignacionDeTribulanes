
 $(document).ready(  function() {
   $('#add').on('click', function() {
     $('.prueba').append('<div class="form-group form-inline"><input type="text" class=" form-control " > <button  type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="mas fa fa-plus-circle"></i></button></div>');
   })
});
