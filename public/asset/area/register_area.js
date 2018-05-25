$(document).ready(function(){
  $("#name").addClass("input-text");
  $("#button_register_area").on('click', function(e){
    e.preventDefault();
    form = $("#register_area");
    $.ajax({
      content_type: "application/json",
      url: '/registrar_area',
      type: "POST",
      data: form.serialize(),
      success: function(response){
        if(response.status){
          swal("Registro exitoso!","se registro a" + response.name, "success");
          $('.swal2-confirm').on('click', function (event2) {
            event2.preventDefault();
            location.reload();
          })
        }
        else{
          swal({
            position: 'center',
            type: 'error',
            title: 'Error al registrar, campos por llenar',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    });
  });
});
