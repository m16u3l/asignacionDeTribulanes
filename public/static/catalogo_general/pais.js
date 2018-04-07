$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_codigo').val($(this).data("codigo")).attr('readonly', true);
    $('#formulario_actualizar_modal input#id_pais').val($(this).data("pais"));
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
    var codigo = data[0];
    $('#eliminar_modal input#eliminar').val(codigo);
  });

  $("input#id_pais").addClass('uppercase');
  $('input#id_codigo').mask('9999');

});
