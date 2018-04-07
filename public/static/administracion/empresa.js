$(document).ready(function() {

  // $('.registrar').on('click', function(evento) {
  //   evento.preventDefault();
  //   formulario = $('#formulario_registro_form')
  //   $('.close').click();    
  //   swal("Registro existoso!!", "El formulario fue registrado con exito", "success")
  //   $('.confirm').on('click', function (evento2) {
  //     formulario.submit()
  //   });
  // });
  
    
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

  // Validaciones
  $('input#id_ruc').mask("9?9999999999");
  $('input#id_rrss').addClass("uppercase");
  $('input#id_ejercicio').mask("9999");
  $('input#id_tasa_igv').mask("9?999.99");
  $('input#id_coeficiente').mask("9?.9999");
  $('input#id_direccion').addClass("uppercase");
  $('input#id_importe_minimo').mask("9?99999.99");
  $('input#id_telefono_1').mask("999999?99999999");
  $('input#id_telefono_2').mask("999999?99999999");
  $('input#id_nombre_comercial').addClass("uppercase");
  $('input#id_nombre_corto').addClass("uppercase");
  $('input#id_publicidad').addClass("uppercase");
  $('input#id_texto_anterior_subtitulo').addClass("uppercase");
  
});
