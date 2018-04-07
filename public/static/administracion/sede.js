$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_id').val($(this).data("id"));
    $('#formulario_actualizar_form input#id_nombre_sede').val($(this).data("nombre_sede"));
    $('#formulario_actualizar_form input#id_direccion').val($(this).data("direccion"));
    $('#formulario_actualizar_form input#id_pedido').val($(this).data("pedido"));    
    $('#formulario_actualizar_form select#id_ubigeos').val($(this).data("ubigeos")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_id"));
    
  });
  
  // Validaciones
  $('input#id_nombre_sede').addClass("uppercase");
  $('input#id_direccion').addClass("uppercase");
  $('input#id_pedido').addClass("input-number");
});
