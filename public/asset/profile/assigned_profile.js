$(document).on('click', '#boton_finalizar_tribunal', function() {
  $('#finalize_profile_modal input#finalize_profile').val($(this).data("finalize_profile"));
  $('#send_mail_modal input#send_mail').val($(this).data("send_mail"));
  $('#send_mail_modal input#title_mail').val($(this).data("title"));
  $('#send_mail_modal input#student_mail').val($(this).data("estudiantes"));
  $('#send_mail_modal input#tutors_mail').val($(this).data("tutores"));
  $('#send_mail_modal input#tribunal_mail').val($(this).data("tribunales"));
  $('#send_mail_modal input#date_asignate').val($(this).data("date_asignate"));
  $('#label_title').text($(this).data("title"));
});

$('#buton_date_defended').on('click', function() {
  var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
  $("#ocultar_mensaje").removeClass("ocultar_mensaje");
  $("input#buton_date_defended").get(0).type = 'hidden';
  $("input#date_defended").get(0).type = 'date';
  $("input#buton_save").get(0).type = 'submit';
  $("input#date_defended").val(today);
});
