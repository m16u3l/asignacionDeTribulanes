$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#modal_actualizar_banco input#id_codigo').val($(this).data("codigo"));
    $('#modal_actualizar_banco input#id_numero_cuenta').val($(this).data("numero_cuenta")).attr('readonly', true);
    $('#modal_actualizar_banco input#id_codigo_banco').val($(this).data("codigo_banco"));
    $('#modal_actualizar_banco input#id_nombre_corto').val($(this).data("nombre_corto"));
    $('#modal_actualizar_banco select#id_propiedad').val($(this).data("propiedad")).trigger('change');
    $('#modal_actualizar_banco input#id_rrss').val($(this).data("rrss"));
    $('#modal_actualizar_banco input#id_ruc').val($(this).data("ruc"));
    $('#modal_actualizar_banco select#id_moneda').val($(this).data("moneda")).trigger('change');
    $('#modal_actualizar_banco select#id_cuenta_contable').val($(this).data("cuenta_contable")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_codigo"));
    
  });

  // Validaciones

  $('input#id_codigo').addClass("uppercase");
  $('input#id_numero_cuenta').addClass("input-cuenta-banco");
  $('input#id_codigo_banco').addClass("uppercase");
  // $('input#id_nombre').addClass("uppercase");
  $('input#id_nombre_corto').addClass("uppercase");
  // $('input#id_saldo').mask("99?9999999.99"); // Float
  $('input#id_rrss').addClass("uppercase");
  $('input#id_ruc').mask("99999999999");

  // Default
  $('#modal_registrar_banco select#id_moneda').val(1).trigger('change');
  // $('#formulario_registrar_form input#id_ruc').val("0000")
  // $('#formulario_registrar_form input#id_saldo').val("000000000.00")
});
