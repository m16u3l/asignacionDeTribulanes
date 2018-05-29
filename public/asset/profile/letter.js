
function omar(profile,tutors, letters, modality){
var teacher, tutor, supervisor;
$('#letter_title').text(profile.title);

for (var i = 0; i < letters.length; i+=1) {
  if(letters[i].name == 'teacher'){
    teacher=letters[i];
  }else if(letters[i].name == 'tutor'){
    tutor=letters[i];
  }else if(letters[i].name == 'supervisor'){
    supervisor=letters[i];
  }
}

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
  erInput.value="true";
  erInput.checked =tutors[i].pivot.letter;

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
    $('input#type_letter').val(tutor.id);

    form = $("#register_letter");

    $.ajax({
      url: "/registrar_letter",
      content_type: "application/json",
      type: "POST",
      data: form.serialize(),
      success: function (response) {
        if(response.status){
          //
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

  var letter_teacher = document.getElementById("letter_teacher");
  letter_teacher.checked =teacher.pivot.letter;
  $('#letter_teacher').on('change', function(){
    if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
    } else {
      $(this).attr('value', 'false');
    }

    $('input#profile_id').val(profile.id);
    $('input#professional_id').val(this.name);
    $('input#valor').val(this.value);
    $('input#type_letter').val(teacher.id);

    form = $("#register_letter");

    $.ajax({
      url: "/registrar_letter",
      content_type: "application/json",
      type: "POST",
      data: form.serialize(),
      success: function (response) {

        if(response.status){
          //
        }
      }
    });
  });

  $("#div_letter_supervisor").addClass("hidden_div");
  if(modality.name =='Adscripción'){
    $("#div_letter_supervisor").removeClass("hidden_div");
    $("#letter_supervisor").checked = supervisor.pivot.letter;

    $('#letter_supervisor').on('change', function(){
      if ($(this).is(':checked')) {
      $(this).attr('value', 'true');
      } else {
        $(this).attr('value', 'false');
      }

      $('input#profile_id').val(profile.id);
      $('input#professional_id').val(this.name);
      $('input#valor').val(this.value);
      $('input#type_letter').val(supervisor.id);

      form = $("#register_letter");

      $.ajax({
        url: "/registrar_letter",
        content_type: "application/json",
        type: "POST",
        data: form.serialize(),
        success: function (response) {
          if(response.status){
            //
          }
        }
      });
    });


  }
  $('#confirm_letter').on('click', function(){
    $('input#confirm_profile_id').val(profile.id);

    form = $("#form_confirm_letter");

    $.ajax({
      url: "/confirm_letter",
      content_type: "application/json",
      type: "POST",
      data: form.serialize(),
      success: function (response) {
        if(response.status){
          swal("Registro exitoso!","el perfil a sido aprobado", "success");
          $('.swal2-confirm').on('click', function (event2) {
            event2.preventDefault();
            location.reload();
          })
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
  });
};
