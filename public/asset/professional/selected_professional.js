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
      $("#area-related-list").append(professional);
    } else {
      $("#not-related-list").append(professional);
    }
    selectedProf--;
    console.log("wii");
  } else {

    if (selectedProf + assignedProf < totalProf) {
      if (selectedProf == 0) {
        $("#no-selection-message").addClass("d-none");
      }
      selectedProf++;
      $("#selected-professional-list").append(professional);
      $(professional).removeClass("col-md-6");
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
        location.reload();
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