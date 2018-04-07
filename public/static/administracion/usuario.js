$(document).ready(function() {

  var dataTable = $('.table').DataTable();


  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_usuario').val($(this).data("usuario")).attr('readonly',true);
    $('#formulario_actualizar_form input#id_password').val($(this).data("password"));    
    $('#formulario_actualizar_form input#id_nombre').val($(this).data("nombre"));
    $('#formulario_actualizar_form input#id_dni').val($(this).data("dni"));
    $('#formulario_actualizar_form select#id_rol').val($(this).data("rol")).trigger('change');    
    $('#formulario_actualizar_form input#id_licencia').val($(this).data("licencia"));
    $('#formulario_actualizar_form input#mydatepicker').val($(this).data("fecha_nacimiento"));
    $('#formulario_actualizar_form input#id_domicilio').val($(this).data("domicilio"));
    $('#formulario_actualizar_form select#id_sexo').val($(this).data("sexo")).trigger('change');
    $('#formulario_actualizar_form select#id_estado').val($(this).data("estado")).trigger('change');
    $('#formulario_actualizar_form input#id_telefono').val($(this).data("telefono"));
    $('#formulario_actualizar_form input#id_email').val($(this).data("email"));
    $('#formulario_actualizar_form select#id_serie').val($(this).data("serie")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_usuario"));
  });
  
  // Validar
  $('input#id_nombre').addClass("uppercase");
  $('input#id_dni').mask("99999999");
  $('input#id_licencia').mask("999999999");
  $('input#id_domicilio').addClass("uppercase");
  $('input#id_telefono').mask("999999?9999");  

});

