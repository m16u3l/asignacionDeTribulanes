$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_dni').val($(this).data("dni")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_nombre').val($(this).data("nombre"));
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
    var data = dataTable.row($(this).parents('tr')).data();
    var id = data[0];
    $('#eliminar_modal input#eliminar').val(id);
  });

  // Validaciones
  $('input#id_dni').mask("99999999")
  $('input#id_nombre').addClass("uppercase")

});
