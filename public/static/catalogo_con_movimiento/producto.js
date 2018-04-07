$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_id_producto').val($(this).data("id_producto")).attr('readonly', true);
    $('#formulario_actualizar_form input#id_nombre').val($(this).data("nombre"));
    $('#formulario_actualizar_form select#id_con_ivg').val($(this).data("con_igv"));
    $('#formulario_actualizar_form input#id_precio_1').val($(this).data("precio_1"));
    $('#formulario_actualizar_form input#id_precio_2').val($(this).data("precio_2"));
    $('#formulario_actualizar_form input#id_precio_3').val($(this).data("precio_3"));
    $('#formulario_actualizar_form input#id_utilidad_importe_1').val($(this).data("utilidad_importe_1"));
    $('#formulario_actualizar_form input#id_utilidad_importe_2').val($(this).data("utilidad_importe_2"));
    $('#formulario_actualizar_form input#id_utilidad_importe_3').val($(this).data("utilidad_importe_3"));
    $('#formulario_actualizar_form input#id_utilidad_porcentual_1').val($(this).data("utilidad_porcentual_1"));
    $('#formulario_actualizar_form input#id_utilidad_porcentual_2').val($(this).data("utilidad_porcentual_2"));
    $('#formulario_actualizar_form input#id_utilidad_porcentual_3').val($(this).data("utilidad_porcentual_3"));
    $('#formulario_actualizar_form input#id_codigo_barra').val($(this).data("codigo_barra"));
    $('#formulario_actualizar_form input#id_marca').val($(this).data("marca"));
    $('#formulario_actualizar_form input#id_peso').val($(this).data("peso"));
    $('#formulario_actualizar_form input#id_precio_compra').val($(this).data("precio_compra"));
    $('#formulario_actualizar_form input#id_percepcion').val($(this).data("percepcion"));
    // $('#formulario_actualizar_form input#id_stock_minimo').val($(this).data("stock_minimo"));
    // $('#formulario_actualizar_form input#id_costo_soles').val($(this).data("costo_soles"));
    $('#formulario_actualizar_form select#id_grupo').val($(this).data("grupo")).trigger('change');
    $('#formulario_actualizar_form select#id_categoria').val($(this).data("categoria")).trigger('change');
    $('#formulario_actualizar_form select#id_unidad_medida').val($(this).data("unidad_medida")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("actualizar_id_producto"));    
  });

  // Validaciones
  $('input#id_id_producto').addClass("input-number");
  $('input#id_nombre').addClass("uppercase");
  $('input#id_codigo_barra').addClass("input-number");
  $('input#id_marca').addClass("uppercase");
  // Todo float hacia abajo
  $('input#id_precio_1').mask("999?999.99");
  $('input#id_precio_2').mask("999?999.99");
  $('input#id_precio_3').mask("999?999.99");
  $('input#id_utilidad_importe_1').mask("999?999.9999");
  $('input#id_utilidad_importe_2').mask("999?999.9999");
  $('input#id_utilidad_importe_3').mask("999?999.9999");
  $('input#id_utilidad_porcentual_1').mask("999?.99");
  $('input#id_utilidad_porcentual_2').mask("999?.99");
  $('input#id_utilidad_porcentual_3').mask("999?.99");
  $('input#id_peso').mask("999?999.999");
  $('input#id_precio_compra').mask("999?999.9999");
  $('input#id_percepcion').mask("99?.99");
  $('input#id_stock_minimo').addClass("input-number");

  // Cargar valores 0
  
  // $('#formulario_registrar_form input#id_precio_1').val("000000.00");
  $('#formulario_registrar_form input#id_precio_2').val("000000.00");
  $('#formulario_registrar_form input#id_precio_3').val("000000.00");
  $('#formulario_registrar_form input#id_utilidad_importe_1').val("000000.0000");
  $('#formulario_registrar_form input#id_utilidad_importe_2').val("000000.0000");
  $('#formulario_registrar_form input#id_utilidad_importe_3').val("000000.0000");
  $('#formulario_registrar_form input#id_utilidad_porcentual_1').val("000.00");
  $('#formulario_registrar_form input#id_utilidad_porcentual_2').val("000.00");
  $('#formulario_registrar_form input#id_utilidad_porcentual_3').val("000.00");
  $('#formulario_registrar_form input#id_peso').val("000000.000");
  $('#formulario_registrar_form input#id_precio_compra').val("000000.0000");
  $('#formulario_registrar_form input#id_percepcion').val("00.00");
  $('#formulario_registrar_form select#id_categoria').val(1).trigger('change');
  
});
