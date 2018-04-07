$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#datepicker').val($(this).data("fecha")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_id').val($(this).data("id"));
    $('#formulario_actualizar_modal input#id_compra').val($(this).data("compra"));
    $('#formulario_actualizar_modal input#id_venta').val($(this).data("venta"));
  });


  /**
   * Envio Ajax
   **/
  $('.actualizar').on('click', function(evento) {
    evento.preventDefault()
    formulario = $('#formulario_actualizar_form')
    $.ajax({
      content_type: 'application/json',
      url: formulario.attr('action'),
      type: 'POST',
      data: formulario.serialize(),
      success: function(response) {
        location.reload()
      }
    })

  });


  /**
   * Abrir eliminar modal
   **/
  $('.table tbody').on('click', 'a.remove-row', function() {
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_id"));
  });

  // Validaciones
  $('input#id_compra').mask("9?999.999");
  $('input#id_venta').mask("9?999.999");

  $('#formulario_registro_form input#id_compra').val("00000.00");
  // $('#formulario_registro_form input#id_venta').val("0");
});
