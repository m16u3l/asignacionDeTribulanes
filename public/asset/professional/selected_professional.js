var totalProf = 3;
var selectedProf = 0;

function addProfessional(professional) {
  var added = document.createElement("div");

  if ($(professional).parent().attr("id") == "selected-professional-list") {
    if ($(professional).hasClass("area-related-professional")) {
      $("#area-related-list").append(professional);
    }
    else{
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
      console.log("wii");
    }
  }
}

function increaseMaxProf(){
  if(totalProf<6){
    totalProf++;
    $("#professional-number-label").text(selectedProf+"/"+totalProf);
    console.log(selectedProf+"/"+totalProf);
  }
}

function decreaseMaxProf(){
  if(totalProf>3){
    totalProf--;
    $("#professional-number-label").text(selectedProf+"/"+totalProf);
  }
}

function increaseSelectedProf(){
  selectedProf++;
  $("#professional-number-label").text(selectedProf+"/"+totalProf);
}