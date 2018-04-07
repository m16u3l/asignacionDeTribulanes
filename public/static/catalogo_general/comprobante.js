$(document).ready(function() {
  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    var data = dataTable.row($(this).parents('tr')).data();
    var id_comprobante = data[0];
    var comprobante = data[1];
    $('#formulario_actualizar_modal input#id_id_comprobante').val(id_comprobante).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_comprobante').val(comprobante);
  });

  /**
   * Registrar 
   **/
  $('.registrar').on('click', function(evento) {
    evento.preventDefault()
    formulario = $('#formulario_registro_form')
    $.ajax({
      content_type: 'application/json',
      url: formulario.attr('action'),
      type: 'POST',
      data: formulario.serialize() + "&registrar=True",
      success: function(response) {
        if (response['operacion']) {
          swal("Registro existoso!", "El formulario fue registrado con exito", "success")
          $('.close').click();
          $('.confirm').on('click', function (evento2) {
            evento2.preventDefault();
            location.reload();
          });
        }
	else{
	  swal("El registro ya existe!");
	}
      }
    })
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
      data: formulario.serialize() + "&actualizar=True",
      success: function(response) {
        if (response['operacion']) {
          swal("Actualizacion existosa!", "El formulario fue actualizado con exito", "success")
          $('.close').click();
          $('.confirm').on('click', function (evento2) {
            evento2.preventDefault();
            location.reload();
          });
        };
      }
    })
  });


  /**
   * Abrir eliminar modal
   **/
  $('.table tbody').on('click', 'a.remove-row', function() {
    var data = dataTable.row($(this).parents('tr')).data();
    var id_comprobante = data[0];
    $('#eliminar_modal input#eliminar').val(id_comprobante);
  });
  
  // Validator
  $('input#id_comprobante').addClass("uppercase");
  $('input#id_id_comprobante').mask("99");

});
