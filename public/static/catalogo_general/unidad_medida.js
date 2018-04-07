$(document).ready(function() {

  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_modal input#id_medida').val($(this).data("medida"));
    $('#formulario_actualizar_modal input#id_nacional').val($(this).data("nacional"));
    $('#formulario_actualizar_modal input#id_internacional').val($(this).data("internacional")).attr('readonly', true);
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
    $('#eliminar_modal input#eliminar').val($(this).data("internacional"));
  });

  $("input#id_medida").addClass('uppercase');
  // $("input#id_internacional").addClass('uppercase');
  // $("input#id_nacional").addClass('uppercase');  
});
