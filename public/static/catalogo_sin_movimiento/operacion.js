$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_id_operacion').val($(this).data("id_operacion")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_operacion').val($(this).data("operacion"));

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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar"));
  });

  // Validaciones

  $('input#id_id_operacion').mask("***");
  $('input#id_id_operacion').addClass("uppercase");
  
  $('input#id_operacion').addClass("uppercase");
  $('input#id_id_operacion').addClass("input-text");

});
