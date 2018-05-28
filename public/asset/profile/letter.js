function omar(profile,tutors){
$('#letter_title').text(profile.title);

var myNode = document.getElementById("div_letter");
while (myNode.firstChild) {
  myNode.removeChild(myNode.firstChild);
}
//$('#letter_title').text(profile.title);

for (var i = 0; i < tutors.length; i+=1) {

  var capa = document.getElementById("div_letter");
  var label = document.createElement("label");

  label.innerHTML = tutors[i].name + " " + tutors[i].last_name_father + " " + tutors[i].last_name_mother ;

  var div = document.createElement('div');
  div.className += " row offset-1 col-md-11";
  var divlabel = document.createElement('div');
  divlabel.className += "col-md-6";
  var divinput = document.createElement('div');
  divinput.className += "col-md-6";

  var erInput = document.createElement('INPUT');
  
  erInput.type="checkbox";
  erInput.value="true";
  erInput.checked =tutors[i].pivot.letter;
  //console.log(tutors[i].id);
  erInput.name = tutors[i].id;

  erInput.onchange = function(){
    if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
    } else {
      $(this).attr('value', 'false');
    }
    $('input#profile_id').val(profile.id);
    $('input#professional_id').val(this.name);
    $('input#valor').val(this.value);

    form = $("#register_letter");

    $.ajax({
      url: "/registrar_letter",
      content_type: "application/json",
      type: "POST",
      data: form.serialize(),
      success: function (response) {

        if(response.status){
          console.log("omars");
        }
      }
    });

  };
  divlabel.appendChild(label);
  divinput.appendChild(erInput);
  div.appendChild(divlabel);
  div.appendChild(divinput);
  capa.appendChild(div);

  }
};
