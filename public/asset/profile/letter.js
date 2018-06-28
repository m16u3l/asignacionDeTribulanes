var Modality;
var profile1;
var Tutors;
$('#confirm_letter').on('click', function(){
  
  var vec = "";
  for(var i = 0; i < Tutors.length; i+=1) {
    
    var aux = '#'+ Tutors[i].id;
    
    if($(aux).val()=="false"){
      vec = "false";
    }
  }
  if(vec=="false"){

    swal({
    position: 'center',
    type: 'error',
    title: 'Error al registrar, no cuenta con las cartas requeridas',
    showConfirmButton: false,
    timer: 1500
    });
  }else{
   
    if($('#letter_teacher').val()=="true"){
      
    if(Modality.name =='Adscripción'){
      if($('#letter_supervisor').val()=="true"){

          location.href ="/perfiles/" + profile1.id;
        
      }else{
        swal({
        position: 'center',
        type: 'error',
        title: 'Error al registrar, no cuenta con las cartas requeridas',
        showConfirmButton: false,
        timer: 1500
        });
      }
    }else{
      location.href ="/perfiles/" + profile1.id;
    }
  }else{
    swal({
    position: 'center',
    type: 'error',
    title: 'Error al registrar, no cuenta con las cartas requeridas',
    showConfirmButton: false,
    timer: 1500
    });
  }
  }
  

});

function omar(profile,tutors, modality){
Modality=modality;
profile1=profile;
Tutors=tutors;
$('#letter_title').text(profile.title);

var myNode = document.getElementById("div_letter");
while (myNode.firstChild) {
  myNode.removeChild(myNode.firstChild);
}

for (var i = 0; i < tutors.length; i+=1) {
  
  var capa = document.getElementById("div_letter");
  var label = document.createElement("label");

  label.innerHTML = tutors[i].name + " " + tutors[i].last_name_father + " " + tutors[i].last_name_mother ;

  var div = document.createElement('div');
  div.className += " row offset-1 col-md-11";
  var divlabel = document.createElement('div');
  divlabel.className += "col-md-9";
  var divinput = document.createElement('div');
  divinput.className += "col-md-2";

  var erInput = document.createElement('INPUT');

  erInput.type="checkbox";
  erInput.value="false";
  erInput.id = tutors[i].id;
  erInput.onchange = function(){
    if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
    } else {
      $(this).attr('value', 'false');
    }
  };
  divlabel.appendChild(label);
  divinput.appendChild(erInput);
  div.appendChild(divlabel);
  div.appendChild(divinput);
  capa.appendChild(div);
  }
  var letter_teacher =  document.getElementById("letter_teacher");
  letter_teacher.checked = false;
  $('#letter_teacher').checked = false;
  $('#letter_teacher').on('change', function(){
    if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
    } else {
      $(this).attr('value', 'false');
    } 

  });
  var letter_supervisor =  document.getElementById("letter_supervisor");
  letter_supervisor.checked = false;
  $("#div_letter_supervisor").addClass("hidden_div");
  if(modality.name =='Adscripción' || modality.name =='Trabajo Dirigido'){
    $("#div_letter_supervisor").removeClass("hidden_div");

    $('#letter_supervisor').on('change', function(){
      if ($(this).is(':checked')) {
      $(this).attr('value', 'true');
      } else {
        $(this).attr('value', 'false');
      }
    });
  }
}

