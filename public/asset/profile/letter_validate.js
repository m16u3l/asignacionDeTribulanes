$(document).ready(function () {
    $(document).on('click', '#boton_asignar_tribunal', function () {
        $('#check_profile_letter_modal').show();
        $('#check_profile_letter_modal').modal('toggle');

        $('.modal-title').text($(this).data('title'));

        $('#carta_docente').text("Carta de Docente de la materia");

        var tutores = $(this).data('tutors');
        tutores.forEach(tutor => {
            $('#carta_tutor_1').text("Carta de Tutor: "
                + tutor.name + " "
                + tutor.last_name_father + " "
                + tutor.last_name_mother);
        });

        if ($(this).data('modality') == "Adscripción"
            || $(this).data('modality') == "Trabajo Dirigido") {
            $('#check_modality').show();
            $('#carta_modality').text("Carta de Modalidad: " + $(this).data('modality'));
        } else {
            $('#check_modality').hide();
            $('#value_4').prop('checked', true);
        }
    });
    $(document).on('click', '#boton_continuar', function () {

        $.ajax({
            method: 'post',
            url: 'verificar_cartas',
            dataType: 'JSON',
            data: {
                'id_profile': $(this).data('id'),
                'letter_tutor': $('#value_2').prop('checked'),
                'letter_teacher': $('#value_1').prop('checked'),
                'letter_modality': $('#value_4').prop('checked')
            },
            success: function (data) {
                console.log(data);
                alert(data);
                if (data.errors) {
                    window.location.replace('lista_perfiles');

                } else {
                    window.location.replace('asignacion' + $(this).data('id'));
                }
            }
        });
    });
});
