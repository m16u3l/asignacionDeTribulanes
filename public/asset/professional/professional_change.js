var selected = 0;
var substitute = false;

$('.select-professional').on('click', function () {

  if ($(this).find(".d-none").length != 0) {

    if (selected == 0) {
      $(this).find(".check-mark").removeClass("d-none");
      $(this).find(".check-mark").addClass("selected-prof");
      selected++;
    } else {
      alert("Solo puede sustituir un tribunal a la vez")
    }
  } else {

    $(this).find(".check-mark").addClass("d-none");
    $(this).find(".check-mark").removeClass("selected-prof");
    selected--;
  }
});

var minProf = 3;

function addProfessional(professional) {
  var added = document.createElement("div");

  if ($(professional).parent().attr("id") == "selected-professional-list") {
    if (substitute) {
      $(professional).addClass("col-md-6");
      if ($(professional).hasClass("area-related-professional")) {
        $(professional).addClass("related-element");
        $("#area-related-list").append(professional);
      } else {
        $(professional).addClass("not-related-element");
        $("#not-related-list").append(professional);
      }
      substitute = false;
      $("#no-selection-message").removeClass("d-none");
    }
  } else {
    if (!substitute) {
      $("#no-selection-message").addClass("d-none");
      substitute = true;
      $("#selected-professional-list").append(professional);
      $(professional).removeClass("col-md-6 related-element not-related-element");
    }

  }
}



function registerProf() {
  /*{
    if (selectedProf == totalProf) {
      var listOfProf = $("#selected-professional-list").find(".register_prof");
      for (var val of listOfProf) {
        var par = $(val).parent();
        var token = $($(par).children()[0]).attr("value");
        var profileId = $($(par).children()[1]).attr("value");
        var proffesionalId = $($(par).children()[2]).attr("value");
        var dataString = "_token=" + token + "&profile_id=" + profileId + "&professional_id=" + proffesionalId;

        register(dataString);

      }

      //alert (dataString);return false;
      setTimeout(function () {
        location.href = '/perfiles';
      }, 500);
    } else {

      if (selectedProf >= totalProf) {

        alert("El perfil ya tiene profesionales asignados.");
      } else {

        alert("Por favor seleccione la cantidad requerida de profesionales.");
      }
    }
  }*/
}

function register(postData) {
  $.ajax({
    type: "POST",
    url: "/registrar_tribunal",
    data: postData,
    success: function () {}
  });
  return true;
}

function paginationNotRelated(page) {
  var pag = parseInt($(page).attr("page"));
  $($($(page).parent()).children()).removeClass("active");
  $(page).addClass("active");

  $(".not-related-element").addClass("d-none");
  for (var i = 0; i < 8; i++) {

    $($("#not-related-list").children()[pag * 8 + i]).removeClass("d-none");
  }

}

function paginationRelated(page) {
  var pag = parseInt($(page).attr("page"));
  $($($(page).parent()).children()).removeClass("active");
  $(page).addClass("active");

  $(".related-element").addClass("d-none");
  for (var i = 0; i < 8; i++) {

    $($("#area-related-list").children()[pag * 8 + i]).removeClass("d-none");
  }

}


window.onload = function () {
  $(".not-related-element").addClass("d-none");
  $(".related-element").addClass("d-none");

  for (var i = 0; i < 8; i++) {
    $($("#not-related-list").children()[i + 2]).removeClass("d-none");
  }
  for (var i = 0; i < 8; i++) {
    $($("#area-related-list").children()[i + 2]).removeClass("d-none");
  }

  var notNeccesaryButtons = $("#not-related-list").children().length / 8;
  for (var i = 0; i < notNeccesaryButtons; i++) {
    var button = "<li class='page-item' page=" + i + " onclick='paginationNotRelated(this)'> <a class='page-link bg-theme-4'>" + (i + 1) + "</a></li>";
    $("#not-related-pagination").append($(button))
  }
  $($("#not-related-pagination").children()[0]).addClass("active");
  var neccesaryButtons = $("#area-related-list").children().length / 8;
  for (var i = 0; i < neccesaryButtons; i++) {
    var button = "<li class='page-item' page=" + i + " onclick='paginationNotRelated(this)'> <a class='page-link bg-theme-4'>" + (i + 1) + "</a></li>";
    $("#related-pagination").append($(button))

  }
  $($("#related-pagination").children()[0]).addClass("active");

  var li = $(".related-element").find(".name-professional");
  for (value of li) {
    console.log(value.innerHTML);
  }
}

function searchBar() {
  var input = document.getElementById("mySearch");
  var filter = input.value.toUpperCase();
  var li = $(".related-element").find(".name-professional");
  var found = false;
  for (i = 0; i < li.length; i++) {
    var h5 = li[i];

    if (h5) {
      if (h5.innerHTML.toUpperCase().indexOf(filter) > -1) {
        $(li[i]).parent().parent().parent().parent().parent().parent().removeClass("d-none");
        found = true;
      } else {
        $(li[i]).parent().parent().parent().parent().parent().parent().addClass("d-none");
      }
    }
  }
  if (found) {
    $("#related-not-found").addClass("d-none");
  } else {
    $("#related-not-found").removeClass("d-none");
  }
  if (filter == "") {
    $(".related-element").addClass("d-none");
    for (var i = 0; i < 8; i++) {
      $($("#area-related-list").children()[i + 2]).removeClass("d-none");
    }
    $("#related-pagination").removeClass("d-none");
  } else {
    $("#related-pagination").addClass("d-none");
  }

}

function notRelatedSearchBar() {
  var input = document.getElementById("notRelatedMyInput");
  var filter = input.value.toUpperCase();
  var li = $(".not-related-element").find(".name-professional");
  var found = false;
  for (i = 0; i < li.length; i++) {
    var h5 = li[i];

    if (h5) {
      if (h5.innerHTML.toUpperCase().indexOf(filter) > -1) {
        $(li[i]).parent().parent().parent().parent().parent().parent().removeClass("d-none");
        found = true;

      } else {
        $(li[i]).parent().parent().parent().parent().parent().parent().addClass("d-none");
      }
    }
  }

  if (found) {
    $("#not-related-not-found").addClass("d-none");
  } else {
    $("#not-related-not-found").removeClass("d-none");
  }


  if (filter == "") {
    $(".not-related-element").addClass("d-none");
    for (var i = 0; i < 8; i++) {
      $($("#not-related-list").children()[i + 2]).removeClass("d-none");
    }
    $("#not-related-pagination").removeClass("d-none");
  } else {
    $("#not-related-pagination").addClass("d-none");
  }
}

function verify() {
  if (!substitute || selected == 0) {
    alert("Por favor seleccione al profesional que renunciara y a un sustituto")
  } else {
    $('#myModal').modal('show');
  }
}