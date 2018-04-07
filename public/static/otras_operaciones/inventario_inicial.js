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
    $.ajax({
      content_type: 'application/json',
      url: $('#formulario_inventario_inicial').attr('action'),
      type: "POST",
      data: {
	'csrfmiddlewaretoken': csrf_token,
	'change_document': id_documento
      },
      success: function(respuesta){
	if (respuesta.operacion) {
	  $('#id_almacen').val(respuesta.almacen);
	  $('#id_numero').val(respuesta.numero);
	};
      }
    });
  });

  // Valildaciones
  $('#id_numero').addClass("input-number");
  $('#id_cantidad').addClass("input-number");
  $('#id_precio_unitario').addClass("input-float");
  $('#id_total').addClass("input-float");
  // Default
  
  // Change Product
  $('select#id_producto').change(function(){
    id_producto = $('select#id_producto').val();
    csrf_token = getCookie('csrftoken');
    $.ajax({
      content_type: 'application/json',
      url: $('#formulario_inventario_inicial').attr('action'),
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
      url: $('#formulario_inventario_inicial').attr('action'),
      type: "POST",
      data: {
	'csrfmiddlewaretoken': csrf_token,
	'add_detail': producto
      },
      success : function (resultado) {
        if (resultado.operacion) {
	  
	  var val_cantidad = $('#id_cantidad').val();
	  var val_precio_unitario = $('#id_precio_unitario').val();
	  var val_total = $('#id_total').val();

	  var codigo = document.createTextNode(resultado.codigo);
	  var detalle = document.createTextNode(resultado.detalle);
	  var unidad_medida = document.createTextNode(resultado.unidad_medida);
	  var cantidad = document.createTextNode(val_cantidad);
	  var precio_unitario = document.createTextNode(val_precio_unitario);
	  var importe = document.createTextNode(val_total);
	  
	  var tr = document.createElement("TR");
	  var td_codigo =document.createElement("TD");
	  var td_detalle =document.createElement("TD");
	  var td_unidad_medida =document.createElement("TD");
	  var td_cantidad =document.createElement("TD");
	  var td_precio_unitario =document.createElement("TD");
	  var td_importe =document.createElement("TD");

	  var td_button = document.createElement("A");
	  var td_button_icon = document.createElement("I");
	  
	  // Building button class
	  $(td_button).attr({class: 'btn btn-rounded btn-danger', id:'eliminar'});
	  // $(td_button).attr('data-eliminar', resultado.codigo);
	  $(td_button_icon).attr({class: 'fa fa-trash-o'});
	  td_button.append(td_button_icon);
	  // End Button Building

	  td_codigo.append(codigo);
	  td_detalle.append(detalle);
	  td_unidad_medida.append(unidad_medida);
	  td_cantidad.append(cantidad);
	  td_precio_unitario.append(precio_unitario);
	  td_importe.append(importe);

	  tr.append(td_codigo);
	  tr.append(td_detalle);
	  tr.append(td_unidad_medida);
	  tr.append(td_cantidad);
	  tr.append(td_precio_unitario);
	  tr.append(td_importe);
	  tr.append(td_button);

	  $('#tabla_detalle').append(tr);

	}
      }
    });
    // End Ajax
  });
  
  // Delete row to table
  $('.table tbody').on('click', 'a#eliminar',function () {
    $(this).closest('tr').remove();
  });

  // Registrar
  $('#formulario_inventario_inicial').submit(function(event){
    event.preventDefault();
    formulario = $('#formulario_inventario_inicial').serialize();
    var tabla_json = makeJsonFromTable('tabla_json');
    formulario = formulario + "&register=True"+ "&detalle="+JSON.stringify(tabla_json);
    $.ajax({
      content_type: "application/json",
      url: $('#formulario_inventario_inicial').attr('action'),
      type: "POST",
      data: formulario,
      success : function (response) {
        if (response['operacion']) {
          swal("Proceso exitoso", "El inventario inicial se registro con existo", "success")
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
