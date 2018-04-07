$(document).ready(function() {
  //Get CSRF token
  function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
      var cookies = document.cookie.split(';');
      for (var i = 0; i < cookies.length; i++) {
	var cookie = jQuery.trim(cookies[i]);
	// Does this cookie string begin with the name we want?
	if (cookie.substring(0, name.length + 1) == (name + '=')) {
          cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
          break;
	}
      }
    }
    return cookieValue;
  }
  // End Get CSRF_TOKEN

  // Change Document
  $('select#id_documento').change(function(){
    id_documento = $('select#id_documento').val();
    csrf_token = getCookie('csrftoken');
    // Ajax
    $.ajax({
      content_type: 'application/json',
      url: $('#formulario_movimiento').attr('action'),
      type: "POST",
      data: {
	'csrfmiddlewaretoken': csrf_token,
	'change_document': id_documento
      },
      success: function(respuesta){
	if (respuesta.operacion) {
	  $('#id_caja').val(respuesta.caja);
	  $('#id_almacen').val(respuesta.almacen);
	  $('#id_numero').val(respuesta.numero);
	  $('#datepicker').val(respuesta.fecha_emision);
	  // $('#id_serie').val(respuesta.serie)
	};
      }
    });
    // End Ajax
  });

  // Blocked banco and numero operacion if medio_pago == 9
  $('select#id_medio_pago').change(function () {
    id_medio_pago = $('#id_medio_pago').val();
    if (id_medio_pago == 9) {
      $('select#id_banco').select2('disable');
      $('#id_numero_operacion').attr('readonly', true);
    }
    else {
      $('select#id_banco').select2('enable');
      $('#id_numero_operacion').attr('readonly', false);
    }
  });
  // Valildaciones
  $('#id_numero').addClass("input-number");
  $('#id_pago_cuenta').addClass("input-float");
  $('#id_cantidad').addClass("input-number");
  $('#id_precio_unitario').addClass("input-float");
  $('#id_tipo_cambio').addClass("input-float");
  $('#id_percepcion_ME').addClass("input-float");
  $('#id_percepcion_MN').addClass("input-float");
  $('#id_otros_costos_MN').addClass("input-float");
    // Default
  $('#id_total_pagar').val(0);
  $('#id_total_costo').val(0);
  $('#id_total_no_gravada').val(0);
  $('#id_total_valor').val(0);  
  $('#id_total_igv').val(0);  
  $('#id_total_importe').val(0);

  $('#id_ME_total_pagar').val(0);
  $('#id_ME_total_no_gravada').val(0);
  $('#id_ME_total_valor').val(0);  
  $('#id_ME_total_igv').val(0);  
  $('#id_ME_total_importe').val(0);
  $('#id_medio_pago').val(9).trigger('change');

  // hiden
  $('#id_total_no_gravada').attr('type', 'hidden');
  $('#id_ME_total_no_gravada').attr('type', 'hidden');

  // Change Product
  $('select#id_producto').change(function(){
    id_producto = $('select#id_producto').val();
    csrf_token = getCookie('csrftoken');
    $.ajax({
      content_type: 'application/json',
      url: $('#formulario_movimiento').attr('action'),
      type: "POST",
      data: {
  	'csrfmiddlewaretoken': csrf_token,
  	'change_product': id_producto
      },
      success: function(respuesta){
  	if (respuesta.operacion) {
  	  $('#id_precio_unitario').val(respuesta.precio);
  	}
      }
    });
  });

  // Calculate total cost
  $('#id_cantidad').on('input', function(){
    cantidad = $('#id_cantidad').val();
    precio_unitario = $('#id_precio_unitario').val();
    total = parseFloat(precio_unitario) * parseFloat(cantidad);
    $('#id_total').val(total);
  });
  
  $('#id_precio_unitario').on('input', function () {
    cantidad = $('#id_cantidad').val();
    precio_unitario = $('#id_precio_unitario').val();
    total = parseFloat(precio_unitario) * parseFloat(cantidad);
    $('#id_total').val(total);
  });

  $('#id_total').on('input', function () {
    total = $('#id_total').val();
    cantidad = $('#id_cantidad').val();
    precio_unitario = parseFloat(total) / parseFloat(cantidad);
    $('#id_precio_unitario').val(precio_unitario);
  });

  // agregar Producto a la factura
  $('#btn_agregar').on('click', function (evento) {
    evento.preventDefault();
    producto = $('select#id_producto').val();
    csrf_token = getCookie('csrftoken');
    $.ajax({
      content_type: "application/json",
      url: $('#formulario_movimiento').attr('action'),
      type: "POST",
      data: {
  	'csrfmiddlewaretoken': csrf_token,
  	'add_detail': producto
      },
      success : function (resultado) {
        if (resultado.operacion) {
	  // Valores
	  var val_tipo_cambio = parseFloat($('#id_tipo_cambio').val());
	  var val_parciales = parseFloat($('#id_total').val());
	  var val_importe = val_tipo_cambio * val_parciales;
	  importe = Math.round(importe * 100) / 100;
	  var val_exonera = val_importe;
	  
  	  var val_cantidad = $('#id_cantidad').val();
  	  var val_precio_unitario = $('#id_precio_unitario').val();
	  
  	  var total_importe = parseFloat($('#id_total_importe').val()) + parseFloat(val_importe);
	  var total_costo = (parseFloat($('#id_otros_costos_MN').val()) + total_importe);
	  var total_pagar = total_importe + parseFloat($('#id_percepcion_MN').val());
	  
	  var ME_total_importe = parseFloat($('#id_ME_total_importe').val()) + val_parciales ;
	  var ME_total_pagar =  ME_total_importe + parseFloat($('#id_percepcion_ME').val());
	  
  	  // Round
	  total_pagar = Math.round(total_pagar * 100) / 100 ;
	  total_costo = Math.round(total_costo * 100) / 100 ;
  	  total_importe = Math.round(total_importe *100) / 100;
	  
	  ME_total_pagar = Math.round(ME_total_pagar * 100) / 100 ;
  	  ME_total_importe = Math.round(ME_total_importe *100) / 100;
	  
	  
  	  $('#id_total_importe').val(total_importe);
  	  $('#id_total_costo').val(total_costo);
  	  $('#id_total_pagar').val(total_pagar);

	  $('#id_ME_total_importe').val(ME_total_importe);
  	  $('#id_ME_total_pagar').val(ME_total_pagar);
	  
	  // td costo
	  var val_costo = (val_parciales * total_costo) / parseFloat($('#id_ME_total_importe').val()) ;
	  val_costo = Math.round(val_costo * 100 ) / 100;
	  // Elements table
	  // Row Table
  	  var codigo = document.createTextNode(resultado.codigo);
  	  var detalle = document.createTextNode(resultado.detalle);
  	  var unidad_medida = document.createTextNode(resultado.unidad_medida);
  	  var cantidad = document.createTextNode(val_cantidad);
  	  var precio_unitario = document.createTextNode(val_precio_unitario);
	  var parciales = document.createTextNode(val_parciales);
  	  var importe = document.createTextNode(val_importe);
	  var exonera = document.createTextNode(val_exonera);
	  var costo = document.createTextNode(val_costo);
	  
  	  var tr = document.createElement("TR");
  	  var td_codigo =document.createElement("TD");
  	  var td_detalle =document.createElement("TD");
  	  var td_unidad_medida =document.createElement("TD");
  	  var td_cantidad =document.createElement("TD");
  	  var td_parciales =document.createElement("TD");	  
  	  var td_precio_unitario =document.createElement("TD");
  	  var td_importe =document.createElement("TD");
	  var td_exonera = document.createElement("TD");
	  var td_costo = document.createElement("TD");
  	  var td_button = document.createElement("A");
  	  var td_button_icon = document.createElement("I");
	  // End element
	  
  	  // Building button class
  	  $(td_button).attr({class: 'btn btn-rounded btn-danger', id:'eliminar'});
  	  $(td_button_icon).attr({class: 'fa fa-trash-o'});
  	  td_button.append(td_button_icon);
  	  // End Button Building
  	  td_codigo.append(codigo);
  	  td_detalle.append(detalle);
  	  td_unidad_medida.append(unidad_medida);
  	  td_cantidad.append(cantidad);
  	  td_precio_unitario.append(precio_unitario);
	  td_parciales.append(parciales);
  	  td_importe.append(importe);
	  td_exonera.append(exonera);
	  td_costo.append(costo);

  	  tr.append(td_codigo);
  	  tr.append(td_detalle);
  	  tr.append(td_unidad_medida);
  	  tr.append(td_cantidad);
  	  tr.append(td_precio_unitario);
	  tr.append(td_parciales);
  	  tr.append(td_importe);
	  tr.append(td_exonera);
	  tr.append(td_costo);
  	  tr.append(td_button);

  	  $('#tabla_detalle').append(tr);
	  // end Row
  	}
      }
    });
    // End Ajax
  });

  // Delete row to table
  $('.table tbody').on('click', 'a#eliminar',function () {
    row = $(this).parents("tr");
    parcial = row.find("td").eq(5).html();
    importe = row.find("td").eq(6).html();
    exonera = row.find("td").eq(7).html();
    total_costo = row.find("td").eq(8).html();    
    
    var total_importe = parseFloat($('#id_total_importe').val()) - parseFloat(importe);
    var total_parcial = parseFloat($('#id_ME_total_importe').val()) - parseFloat(parcial);
    var total_exonera = parseFloat($('#id_total_no_gravada').val()) - parseFloat(exonera);
    var total_costo = parseFloat($('#id_total_costo').val()) - parseFloat(total_costo);

    // Round
    total_importe = Math.round(total_importe *100) / 100;
    total_parcial = Math.round(total_parcial *100) / 100;
    total_exonera = Math.round(total_exonera *100) / 100;
    total_costo = Math.round(total_costo *100) / 100;
    
    $('#id_total_importe').val(total_importe);
    $('#id_ME_total_importe').val(total_parcial);
    $('#id_total_no_gravada').val(total_exonera);
    $('#id_total_costo').val(total_costo);
    
    var val_tipo_cambio = parseFloat($('#id_tipo_cambio').val());
    
    var total_pagar = total_importe + parseFloat($('#id_percepcion_MN').val());    
    var ME_total_no_gravada = total_exonera / val_tipo_cambio;
    var ME_total_pagar =  total_parcial + parseFloat($('#id_percepcion_ME').val());

    total_pagar = Math.round(total_pagar * 100 ) / 100;
    ME_total_no_gravada = Math.round(ME_total_no_gravada * 100 ) / 100;
    ME_total_pagar = Math.round(ME_total_pagar * 100 ) / 100;                

    $('#id_total_pagar').val(total_pagar);
    $('#id_ME_total_no_gravada').val(ME_total_no_gravada);
    $('#id_ME_total_pagar').val(ME_total_pagar);
    
    // Delete Row View to table
    $(this).closest('tr').remove();
  });

  // Registrar
  $('#formulario_movimiento').submit(function(event){
    event.preventDefault();
    formulario = $('#formulario_movimiento').serialize();
    var tabla_json = makeJsonFromTable('tabla_json');
    formulario = formulario + "&register=True"+ "&detalle="+JSON.stringify(tabla_json);
    console.log(formulario);
    $.ajax({
      content_type: "application/json",
      url: $('#formulario_movimiento').attr('action'),
      type: "POST",
      data: formulario,
      success : function (response) {
        if (response['operacion']) {
          swal("Compra realizada", "La factura fue emitida con exito", "success")
          $('.confirm').on('click', function (evento2) {
            evento2.preventDefault();
            location.reload();
          });
        };        
      }
    });
  });

  // Serie por defecto Usuario carga datos de documento
  if ($('#id_caja').data("serie")) {
    $('select#id_documento').val($('#id_caja').data("serie")).trigger('change');
  }
  
  // Interaccion UI
  $('#id_cantidad').on('keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      $('#btn_agregar').click();
    }
  });
  
  $('#id_precio_unitario').on('keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      $('#btn_agregar').click();
    }
  });
  
  $('#id_total').on('keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      $('#btn_agregar').click();
    }
  });
});
