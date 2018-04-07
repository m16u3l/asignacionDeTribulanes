$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_elemento').val($(this).data("elemento")).attr('readonly',true);
    $('#formulario_actualizar_form input#id_cuenta').val($(this).data("cuenta")).attr('readonly',true);
    $('#formulario_actualizar_form input#id_glosa').val($(this).data("glosa"));
    $('#formulario_actualizar_form select#id_tipo').val($(this).data("tipo")).trigger('change');
    $('#formulario_actualizar_form select#id_estado_cuenta').val($(this).data("estado_cuenta")).trigger('change');
    $('#formulario_actualizar_form select#id_tipo_saldo').val($(this).data("tipo_saldo")).trigger('change');
    $('#formulario_actualizar_form select#id_amarre').val($(this).data("amarre")).trigger('change');
    $('#formulario_actualizar_form select#id_ajuste').val($(this).data("ajuste")).trigger('change');
    $('#formulario_actualizar_form select#id_moneda_extranjera').val($(this).data("moneda_extranjera")).trigger('change');
    $('#formulario_actualizar_form select#id_presupuesto').val($(this).data("presupuesto")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_mayor').val($(this).data("cuenta_mayor")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_amarre_debe').val($(this).data("cuenta_amarre_debe")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_amarre_haber').val($(this).data("cuenta_amarre_haber")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_ajuste_debe').val($(this).data("cuenta_ajuste_debe")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_ajuste_haber').val($(this).data("cuenta_ajuste_haber")).trigger('change');
    $('#formulario_actualizar_form input#id_grupo').val($(this).data("grupo"));
    $('#formulario_actualizar_form input#id_saldo_presupuesto').val($(this).data("saldo_presupuesto"));
    $('#formulario_actualizar_form input#id_nivel').val($(this).data("nivel"));
    $('#formulario_actualizar_form input#datepicker').val($(this).data("fecha_movimiento"));
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
	if (response['operacion']) {
          swal("Actualizacion existosa!", "El formulario fue actualizado con exito", "success");
          $('.close').click();
          $('.confirm').on('click', function (evento2) {
            evento2.preventDefault();
            location.reload();
          });
        };
      }
    });

  });

  /**
   * Abrir eliminar modal
   **/
  $('.table tbody').on('click', 'a.remove-row', function() {
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_cuenta"));        
  });

  // Validation
  $('input#id_elemento').mask("9");
  $('input#id_cuenta').addClass("input-float");
  $('input#id_glosa').addClass("uppercase");
  $('input#id_grupo').mask("99");
  $('input#id_saldo_presupuesto').mask("99?999999999.99");
  $('input#id_nivel').mask("9");
  // Default
  $('#formulario_registrar_form input#id_grupo').val("00");
  $('#formulario_registrar_form input#id_saldo_presupuesto').val("00.00");
  $('#formulario_registrar_form input#id_nivel').val("0");
});
