$(document).ready(function () {
    $(document).on('click', '#boton_asignar_tribunal', function () {
        $('#check_profile_letter_modal').show();
        $('#check_profile_letter_modal').modal('toggle');

        $('.modal-title').text($(this).data('title'));

        $('#carta_docente').text("Carta de Docente de la materia");

        var tutores = $(this).data('tutors');
        tutores.forEach(tutor => {
            $('#carta_tutor_1').text("Carta de Tutor: "
                                    +tutor.name+" "
                                    +tutor.last_name_father+" "
                                    +tutor.last_name_mother);
        });
        
        if ($(this).data('modality') == "Adscripción"
            || $(this).data('modality') == "Trabajo Dirigido") {
            $('#check_modality').show();
            $('#carta_modality').text("Carta de Modalidad: "+ $(this).data('modality'));
        }else{
            $('#check_modality').hide();
        }



        /*
        tutores.forEach(element => {
            $('#yourTable').find('td').each(function(i,obj){
                $(obj).append('<input type="checkbox" id="checkbox'+i+'" name="checkbox'+i+'">');
              });
        });*/

    })
});

  //     
/*
check_modality
        
        $("#boton_asignar_tribunal").click(function () {
            $.ajax({
                type: 'GET',
                url: 'validar_cartas',
                data: {
                    'id': $(this).data('id'),
                    'title': $(this).data('title')
                },
                success: function (data) {

                },
            });
        });

    });
*/
    //$('#boton_asignar_tribunal').on('click','#validar_cartas');

/*function letter_validate(id){
    var route = "{{url('perfiles')}}/"+id+"letter_validate";
    alert(route);
    $('#check_profile_letter').val($(this).data("profile"));
    //alert(id);

    $.get(route, function (data) {
        alert(id);
    })
}
*/
 // $(document).on('click', '#boton_finalizar_tribunal', function() {
   // alert(profile.id);

    //$('#check_profile_letter_modal input #profile').val($(this).data("profile"));
    //{{ route ('asignacion',[$profile->id]) }}
 // });