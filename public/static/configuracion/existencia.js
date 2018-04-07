$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_id').val($(this).data("id"));
    $('#formulario_actualizar_form select#id_almacen').val($(this).data("almacen")).trigger('change');
    $('#formulario_actualizar_form select#id_categoria').val($(this).data("categoria")).trigger('change');
    $('#formulario_actualizar_form select#id_serie').val($(this).data("serie")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_compra').val($(this).data("cuenta_compra")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_venta').val($(this).data("cuenta_venta")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_almacen').val($(this).data("cuenta_almacen")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_variacion').val($(this).data("cuenta_variacion")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_costo_venta').val($(this).data("cuenta_costo_venta")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_devolucion_venta').val($(this).data("cuenta_devolucion_venta")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_merma_costo').val($(this).data("cuenta_merma_costo")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_merma_gasto').val($(this).data("cuenta_merma_gasto")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_consumo_provision').val($(this).data("cuenta_consumo_provision")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_consumo_gasto').val($(this).data("cuenta_consumo_gasto")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_imputable').val($(this).data("cuenta_imputable")).trigger('change');
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
});
