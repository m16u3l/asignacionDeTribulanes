var totalProf = 3;
var selectedProf = 0;

function addProfessional(professional) {
  var added = document.createElement("div");
  if (selectedProf < totalProf) {
    if(selectedProf==0){
      $("#no-selection-message").addClass("d-none");
    }
    selectedProf++;
    $("#selected-professional-list").append(professional);
    console.log("wii");
  }
}