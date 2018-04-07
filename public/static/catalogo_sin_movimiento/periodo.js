$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_id_periodo').val($(this).data("id_periodo")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_anio').val($(this).data("anio"))
    $('#formulario_actualizar_modal select#id_mes').val($(this).data("mes")).trigger('change');
    $('#formulario_actualizar_modal select#id_estado').val($(this).data("estado")).trigger('change');
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
  $('input#id_id_periodo').addClass("input-number");
  $('input#id_anio').mask("9999");

});
