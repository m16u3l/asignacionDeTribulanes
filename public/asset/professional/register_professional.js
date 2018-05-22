$(document).ready(function(){
  $("#name").addClass("input-text");
  $("#last_name_father").addClass("input-text");
  $("#last_name_mother").addClass("input-text");
  $("#ci").addClass("input-number");
  $("#cod_sis").addClass("input-number");
  $("#phone").addClass("input-number");
  $("#email").addClass("input-email");
  
  $("#register1").on('click', function(e){
    e.preventDefault();
    form = $("#register");
    $.ajax({
      content_type: "application/json",
      url: '/registrar_profesional',
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
