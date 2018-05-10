var totalProf = 3;
var selectedProf = 0;
var maxProf = 5;
var minProf = 3;
var assignedProf = $("#assigned-professional-list").children("div").length;


function addProfessional(professional) {
  var added = document.createElement("div");

  if ($(professional).parent().attr("id") == "selected-professional-list") {
    $(professional).addClass("col-md-6");
    if ($(professional).hasClass("area-related-professional")) {
      $(professional).addClass("related-element");
      $("#area-related-list").append(professional);
    } else {
      $(professional).addClass("not-related-element");
      $("#not-related-list").append(professional);
    }
    selectedProf--;
    if (selectedProf == 0) {
      $("#no-selection-message").removeClass("d-none");
    }
    console.log("wii");
  } else {

    if (selectedProf + assignedProf < totalProf) {
      if (selectedProf == 0) {
        $("#no-selection-message").addClass("d-none");
      }
      selectedProf++;
      $("#selected-professional-list").append(professional);
      $(professional).removeClass("col-md-6 related-element not-related-element");
      console.log("wii");
    } else {
      alert("Ha seleccionado/asignado suficientes profesionales.");
    }
  }
}

function increaseMaxProf() {
  if (totalProf < maxProf) {
    totalProf++;
    $("#professional-number-label").text(totalProf);
    console.log(totalProf);
  }
}

function decreaseMaxProf() {
  console.log("wii");
  if (totalProf > minProf) {
    totalProf--;
    $("#professional-number-label").text(totalProf);

    if (selectedProf > totalProf) {
      while (selectedProf > totalProf) {
        addProfessional($("#selected-professional-list").children().last());
      }
    }
  }

}

function increaseSelectedProf() {
  selectedProf++;
  $("#professional-number-label").text(selectedProf + "/" + totalProf);
}

function registerProf() {
  {
    if (selectedProf + assignedProf == totalProf) {
      var listOfProf = $("#selected-professional-list").find(".register_prof");
      for (var val of listOfProf) {
        var par = $(val).parent();
        var token = $($(par).children()[0]).attr("value");
        var profileId = $($(par).children()[1]).attr("value");
        var proffesionalId = $($(par).children()[2]).attr("value");
        var dataString = "_token=" + token + "&profile_id=" + profileId + "&professional_id=" + proffesionalId;
        console.log(dataString);
        register(dataString);

      }

      //alert (dataString);return false;
      setTimeout(function () {
        location.href = '/perfiles';
      }, 500);
    } else {
      if (assignedProf >= totalProf) {
        alert("El perfil ya tiene profesionales asignados.");
      } else {
        alert("Por favor seleccione la cantidad requerida de profesionales.");
      }
    }
  }
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
  console.log(pag);
  $(".related-element").addClass("d-none");
  for (var i = 0; i < 8; i++) {

    $($("#area-related-list").children()[pag * 8 + i]).removeClass("d-none");
  }

}


window.onload = function () {
  $(".not-related-element").addClass("d-none");
  $(".related-element").addClass("d-none");

  for (var i = 0; i < 8; i++) {
    $($("#not-related-list").children()[i+2]).removeClass("d-none");
  }
  for (var i = 0; i < 8; i++) {
    $($("#area-related-list").children()[i+2]).removeClass("d-none");
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
  if(found){
    $("#related-not-found").addClass("d-none");
  } else {
    $("#related-not-found").removeClass("d-none");
  }
  if (filter == "") {
    $(".related-element").addClass("d-none");
    for (var i = 0; i < 8; i++) {
      $($("#area-related-list").children()[i+2]).removeClass("d-none");
    }
    $("#related-pagination").removeClass("d-none");
  }else {
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

  if(found){
    $("#not-related-not-found").addClass("d-none");
  } else {
    $("#not-related-not-found").removeClass("d-none");
  }


  if (filter == "") {
    $(".not-related-element").addClass("d-none");
    for (var i = 0; i < 8; i++) {
      $($("#not-related-list").children()[i+2]).removeClass("d-none");
    }
    $("#not-related-pagination").removeClass("d-none");
  } else {
    $("#not-related-pagination").addClass("d-none");
  }
}