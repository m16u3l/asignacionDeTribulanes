var totalProf = 3;
var selectedProf = 0;
var maxProf = 5;
var minProf = 3;

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

    if (selectedProf < totalProf) {
      if (selectedProf == 0) {
        $("#no-selection-message").addClass("d-none");
      }
      selectedProf++;
      $("#selected-professional-list").append(professional);
      $(professional).removeClass("col-md-6");
      console.log("wii");
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
  /*var listOfProf = $("#selected-professional-list").find(".register_prof");
  for (val of listOfProf) {
    $(val).click(function () {
      var par=$(val).parent();
      console.log(par);
      /*var _tokenval.
      var dataString = 'name=' + name + '&email=' + email + '&phone=' + phone;
      //alert (dataString);return false;
      
      /*$.ajax({
        type: "POST",
        url: "bin/process.php",
        data: dataString,
        success: function () {
          $('#contact_form').html("<div id='message'></div>");
          $('#message').html("<h2>Contact Form Submitted!</h2>")
            .append("<p>We will be in touch soon.</p>")
            .hide()
            .fadeIn(1500, function () {
              $('#message').append("<img id='checkmark' src='images/check.png' />");
            });
        }
      });
      return false;
    });
  }*/

}