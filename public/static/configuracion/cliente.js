
$(document).ready(function() {
  var dataTable = $('.table').DataTable();

  /**
   * Abrir editar modal
   **/
  $('.table tbody').on('click', 'a.edit-row', function() {
    $('#formulario_actualizar_form input#id_ruc').val($(this).data("ruc")).attr('readonly', true);
    $('#formulario_actualizar_form input#id_rrss').val($(this).data("rrss"));
    $('#formulario_actualizar_form input#id_direccion').val($(this).data("direccion"));
    $('#formulario_actualizar_form input#id_credito_maximo_soles').val($(this).data("credito_maximo_soles"));
    $('#formulario_actualizar_form input#id_percepcion').val($(this).data("percepcion"));
    $('#formulario_actualizar_form input#id_contacto').val($(this).data("contacto"));
    $('#formulario_actualizar_form select#id_lista_precio').val($(this).data("lista_precio")).trigger('change');
    $('#formulario_actualizar_form input#id_telefono_1').val($(this).data("telefono_1"));
    $('#formulario_actualizar_form input#id_telefono_2').val($(this).data("telefono_2"));
    $('#formulario_actualizar_form input#id_email').val($(this).data("email"));
    $('#formulario_actualizar_form input#id_web').val($(this).data("web"));
    $('#formulario_actualizar_form input#id_facebook').val($(this).data("facebook"));
    $('#formulario_actualizar_form input#id_saldo_soles').val($(this).data("saldo_soles"));
    $('#formulario_actualizar_form input#id_saldo_dolares').val($(this).data("saldo_dolares"));
    $('#formulario_actualizar_form select#id_tipo_documento').val($(this).data("tipo_documento")).trigger('change');
    $('#formulario_actualizar_form select#id_cuenta_cliente').val($(this).data("cuenta_cliente")).trigger('change');
    $('#formulario_actualizar_form select#id_ubigeos').val($(this).data("ubigeos")).trigger('change');
    $('#formulario_actualizar_form select#id_pais').val($(this).data("pais")).trigger('change');
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
    $('#eliminar_modal input#eliminar').val($(this).data("eliminar_ruc"));    
  });
  
  // Validaciones
  $('input#id_ruc').mask("99999999999");
  $('input#id_rrss').addClass("uppercase");
  $('input#id_direccion').addClass("uppercase");
  $('input#id_credito_maximo_soles').mask("99?99999999.99");  // Float
  $('input#id_percepcion').mask("99?99.99");	        // Float
  $('input#id_proveedor_retenciones').mask("99?99.99"); // Float
  $('input#id_contacto').addClass("uppercase");
  $('input#id_telefono_1').mask("9999999?99999");
  $('input#id_telefono_2').mask("9999999?99999");
  $('input#id_saldo_soles').mask("99?9999999999.99");	// float
  $('input#id_saldo_dolares').mask("99?9999999999.99"); // Float  

  // Default
  $('#formulario_registrar_form input#id_credito_maximo_soles').val("00.00");
  $('#formulario_registrar_form input#id_percepcion').val("00.00");
  $('#formulario_registrar_form input#id_saldo_soles').val("00.00");
  $('#formulario_registrar_form input#id_saldo_dolares').val("00.00");
  $('#formulario_registrar_form input#id_proveedor_retenciones').val("00.00");  
  $('#formulario_registrar_form select#id_pais').val("189").trigger('change');

  // Cambio de mask dependiendo del tipo documentp
  $('#formulario_registrar_form select#id_tipo_documento').change(function(){
    id_tipo_documento = $('#formulario_registrar_form select#id_tipo_documento').val();
    console.log(id_tipo_documento);
    if (id_tipo_documento == "2") {
      $('#formulario_registrar_form input#id_ruc').mask("99999999");
    }
    if (id_tipo_documento == "3") {
      $('#formulario_registrar_form input#id_ruc').mask("99999999999");
    }

  });

});

