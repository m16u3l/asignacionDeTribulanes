$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_id_caja').val($(this).data("id_caja")).attr('readonly', true);
    $('#formulario_actualizar_form input#id_nombre').val($(this).data("nombre"));
    $('#formulario_actualizar_form input#id_saldo_soles').val($(this).data("saldo_soles"));
    $('#formulario_actualizar_form input#id_saldo_dolares').val($(this).data("saldo_dolares"));
    $('#formulario_actualizar_form select#id_cuenta_dolares').val($(this).data("cuenta_dolares")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_soles').val($(this).data("cuenta_soles")).trigger('change');        
  });

  /**
   * Envio Ajax Actualizar
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_id_caja"));        
  });

  // Validaciones

  $('input#id_id_caja').mask("9");
  $('input#id_nombre').addClass("uppercase");
  $('input#id_saldo_soles').mask("99?9999999999.99");
  $('input#id_saldo_dolares').mask("99?999999999.99");

  // Default
  $('#formulario_registrar_form input#id_saldo_soles').val("00.00");
  $('#formulario_registrar_form input#id_saldo_dolares').val("00.00");
  
});
