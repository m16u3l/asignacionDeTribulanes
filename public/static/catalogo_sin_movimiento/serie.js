$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_id_serie').val($(this).data("id_serie")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_serie').val($(this).data("serie"));
    $('#formulario_actualizar_modal select#id_estado').val($(this).data("estado")).trigger('change');
    $('#formulario_actualizar_modal select#id_almacen').val($(this).data("almacen")).trigger('change');
    $('#formulario_actualizar_modal select#id_caja').val($(this).data("caja")).trigger('change');        
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
  $('input#id_id_serie').addClass("uppercase");
  $('input#id_id_serie').mask("****");  
  
  $('input#id_serie').addClass("uppercase");
});
