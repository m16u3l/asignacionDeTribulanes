$(document).ready(function() {
  $(".input-number").bind('keydown', function(e) {
    var targetValue = $(this).val();
    if (e.which === 8 || e.which === 13 || e.which === 9 ||
      e.which === 37 || e.which === 39 || e.which === 46) {
        return;
      }
      if (e.which > 47 && e.which < 58 || e.which > 95 && e.which < 106) {
        var c = String.fromCharCode(e.which);
        var val = parseInt(c);
        var textVal = parseInt(targetValue || "0");
        var result = textVal + val;
      } else {
        e.preventDefault();
      }
  });

  $(".input-text").bind('keydown', function(e) {
    var targetValue = $(this).val();
    if (e.which === 8 || e.which === 13 || e.which === 9 ||
	e.which === 37 || e.which === 39 || e.which === 46) {
      return;
    }
    if (e.which > 64 && e.which < 91) {
      var c = String.fromCharCode(e.which);
      var val = parseInt(c);
      var textVal = parseInt(targetValue || "0");
      var result = textVal + val;
    } else {
      e.preventDefault();
    }
  });

  $(".input-number-text").bind('keydown', function(e) {
    var targetValue = $(this).val();
    if (e.which === 8 || e.which === 13 || e.which === 9 ||
      e.which === 37 || e.which === 39 || e.which === 46) {
      return;
    }
    if (e.which > 47 && e.which < 58 || e.which > 64 && e.which < 91  || e.which > 95 && e.which < 106) {
      var c = String.fromCharCode(e.which);
      var val = parseInt(c);
      var textVal = parseInt(targetValue || "0");
      var result = textVal + val;
    } else {
      e.preventDefault();
    }
  });
  
  $('.input-float').keypress(function(event) {
    if (event.which != 46 && (event.which < 48 || event.which > 59)){
      event.preventDefault();
      if ((event.which == 46) && ($(this).indexOf('.') != -1)) {
        event.preventDefault();
      }
    }
  });
  
  $('.input-cuenta-banco').keypress(function(event) {
    if ((event.which != 46 && event.which != 32 && event.which != 45) && (event.which < 48 || event.which > 59)){
      event.preventDefault();
      // if ((event.which == 46) && ($(this).indexOf('.') != -1)) {
      //   event.preventDefault();
      // }
      // if ((event.which == 32) && ($(this).indexOf(' ') != -1)) {
      //   event.preventDefault();
      // }
      // if ((event.which == 45) && ($(this).indexOf('-') != -1)) {
      //   event.preventDefault()
      // }
    }
  });
  
});


