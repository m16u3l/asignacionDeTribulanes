$(document).ready(function(){
  // Validations
  $("#name").addClass("input-text");
  $("#last_name_father").addClass("input-text");
  $("#last_name_mother").addClass("input-text");
  $("#ci").addClass("input-number");
  $("#cod_sis").addClass("input-number");
  $("#phone").addClass("input-number");
  $("input#email").change(function(){
    response = _email_validate($('#email').val());
    _show_message(response);
  });

  // Register new professional Ajax
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

  // Clean modal register professional
  $("#cancel_register_professional").on('click', function(){
    $("#name").val("");
    $("#last_name_father").val("");
    $("#last_name_mother").val("");
    $("#ci").val("");
    $("#cod_sis").val("");
    $("#email").val("");
    $("#phone").val("");
    $("#address").val("");
    $("#degree").val("");
    $('#register_professinal_modal').modal('toggle');
  });

  // Private methods
  function _email_validate(input) {
    console.log(input);
    var numericExpression = /^w.+@[a-zA-Z_-]+?.[a-zA-Z]{2,3}$/;
    if (input.match(numericExpression))
    return true;
    return false;
  }

  function _show_message(response) {
    if (!response) {
      swal({
        position: 'center',
        type: 'error',
        title: 'email invalido',
        showConfirmButton: false,
        timer: 1500
      });
      $("#email").val("");
    }
  }
});
