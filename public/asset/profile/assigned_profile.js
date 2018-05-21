$(document).on('click', '#boton_finalizar_tribunal', function() {
  $('#finalize_profile_modal input#finalize_profile').val($(this).data("finalize_profile"));
});

$('#buton_date_defended').on('click', function() {
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

  $("input#buton_date_defended").get(0).type = 'hidden';
  $("input#date_defended").get(0).type = 'date';
  $("input#buton_save").get(0).type = 'submit';
  $("input#date_defended").val(today);
});

