$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_id_grupo').val($(this).data("id_grupo")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_grupo').val($(this).data("grupo"));
    $('#formulario_actualizar_modal select#id_tipo').val($(this).data("estado")).trigger('change');
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
  $('input#id_id_grupo').mask("999");
  $('input#id_grupo').addClass("uppercase");

});
