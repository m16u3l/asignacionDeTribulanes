$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Focus select2
   **/
  $('#formulario_registrar_form select#id_tipo_documento').on('change', function(e) {
    $('#formulario_registrar_form select#id_serie').select2('open');
  });

  $('#formulario_registrar_form select#id_serie').on('change', function(e) {
    $('#formulario_registrar_form select#id_periodo').select2('open');
  });

  $('#formulario_registrar_form select#id_periodo').on('change', function(e) {
    $('#formulario_registrar_form select#id_operacion').select2('open');
  });

  $('#formulario_registrar_form select#id_procesado').on('change', function(e) {
    $('#formulario_registrar_form select#id_pagado').select2('open');
  });

  $('#formulario_registrar_form select#id_pagado').on('change', function(e) {
    $('#formulario_registrar_form select#id_entregado').select2('open');
  });



  $('#formulario_registrar_form input[name=fecha]').attr("id", "datepicker_fecha");
  $('#formulario_actualizar_modal input[name=fecha]').attr("id", "datepicker_fecha_edit");
  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_id').val($(this).data("id"));
    $('#formulario_actualizar_modal input#id_numero_supervisor').val($(this).data("numero_supervisor"));
    $('#formulario_actualizar_modal input#id_fecha').val($(this).data("fecha"));
    $('#formulario_actualizar_modal input#id_numero').val($(this).data("numero"));
    $('#formulario_actualizar_modal select#id_procesado').val($(this).data("procesado")).trigger('change');
    $('#formulario_actualizar_modal input#id_fecha_proceso').val($(this).data("fecha_supervisor"));
    $('#formulario_actualizar_modal select#id_pagado').val($(this).data("pagado")).trigger('change');
    $('#formulario_actualizar_modal select#id_entregado').val($(this).data("entregado")).trigger('change');
    $('#formulario_actualizar_modal select#id_tipo_documento').val($(this).data("tipo_documento")).trigger('change');
    $('#formulario_actualizar_modal select#id_serie').val($(this).data("serie")).trigger('change');
    $('#formulario_actualizar_modal select#id_periodo').val($(this).data("periodo")).trigger('change');
    $('#formulario_actualizar_modal select#id_operacion').val($(this).data("operacion")).trigger('change');
  });


  /**
   * Envio Ajax
   **/
  $('.actualizar').on('click', function(evento) {
    evento.preventDefault()
    formulario = $('#formulario_actualizar_modal')
    $.ajax({
      url: formulario.attr('action'),
      content_type: 'application/json',
      type: 'POST',
      data: formulario.serialize(),
      success: function(response) {
        location.reload()
      }
    })

  });




  // Date Picker
  jQuery('#datepicker_fecha').datepicker();
  jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
  });
  jQuery('#datepicker-inline').datepicker();
  jQuery('#datepicker-multiple-date').datepicker({
    format: "dd/mm/yyyy",
    clearBtn: true,
    multidate: true,
    multidateSeparator: ","
  });
  jQuery('#date-range').datepicker({
    toggleActive: true
  });

  // Date Picker
  jQuery('#datepicker_fecha_edit').datepicker();
  jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
  });
  jQuery('#datepicker-inline').datepicker();
  jQuery('#datepicker-multiple-date').datepicker({
    format: "dd/mm/yyyy",
    clearBtn: true,
    multidate: true,
    multidateSeparator: ","
  });
  jQuery('#date-range').datepicker({
    toggleActive: true
  });

  /**
   * Abrir eliminar modal
   **/
  $('.table tbody').on('click', 'a.remove-row', function() {
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_id"));
  });
  // Validaciones
  $('input#id_numero').mask("9?9999999");
  $('input#id_apertura_1').mask("999?99999");
  $('input#id_apertura_2').mask("999?99999");
  $('input#id_numero_supervisor').mask("9?9999999");
  // Default
  $('#formulario_registrar_form input#id_numero').val("0");
  $('#formulario_registrar_form input#id_apertura_1').val("0000");
  $('#formulario_registrar_form input#id_apertura_2').val("0000");
  $('#formulario_registrar_form input#id_numero_supervisor').val("0");
  $('#formulario_registrar_form select#id_procesado').val("NO").trigger('change');

  // funciones extra

  function _x(STR_XPATH) {
    var xresult = document.evaluate(STR_XPATH, document, null, XPathResult.ANY_TYPE, null);
    var xnodes = [];
    var xres;
    while (xres = xresult.iterateNext()) {
      xnodes.push(xres);
    }

    return xnodes;
  }
});
