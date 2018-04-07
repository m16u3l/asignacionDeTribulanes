$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_codigo').val($(this).data("codigo")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_detalle').val($(this).data("detalle"));
    $('#formulario_actualizar_modal input#id_percepcion').val($(this).data("percepcion"));
    $('#formulario_actualizar_modal input#id_precio').val($(this).data("precio"));
    $('#formulario_actualizar_modal select#id_cuenta_servicio').val($(this).data("cuenta_servicio")).trigger('change');
    $('#formulario_actualizar_modal select#id_grupo').val($(this).data("grupo")).trigger('change');
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
    var data = dataTable.row($(this).parents('tr')).data();
    var id = data[0];
    $('#eliminar_modal input#eliminar').val(id);
  });

  // Validaciones
  $('input#id_detalle').addClass("uppercase");
  $('input#id_percepcion').mask("9?999.99");
  $('input#id_precio').mask("9?99999.99");

  // Default
  $('#formulario_registro_form input#id_percepcion').val("00.00");
  $('#formulario_registro_form input#id_precio').val("00.00");

});
