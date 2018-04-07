$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_codigo').val($(this).data("codigo")).attr('readonly',true);
    $('#formulario_actualizar_form input#id_denominacion').val($(this).data("denominacion"));
    $('#formulario_actualizar_form select#id_cierre').val($(this).data("cierre"));
    $('#formulario_actualizar_form input#datepicker').val($(this).data("fecha"));
    $('#formulario_actualizar_form input#id_numero').val($(this).data("numero"));
    $('#formulario_actualizar_form select#id_periodo').val($(this).data("periodo")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_codigo"));        
  });
  
  // Validaciones
  $('input#id_codigo').mask("99");
  $('input#id_denominacion').addClass("uppercase");
  $('input#id_numero').mask("999?99999");
  // Default
  $('#formulario_registro_form input#id_numero').val("00");
});
