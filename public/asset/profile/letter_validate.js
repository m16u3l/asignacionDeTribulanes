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
        e.preventDefault();
        form = $("#letter_validate");
        $.ajax({
            content_type: "application/json",
            url: '/validar_cartas',
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    swal("Cartas validadas", "En: " + response.name, "success");
                    $('.swal2-confirm').on('click', function (event2) {
                        event2.preventDefault();
                        location.reload();
                    })
                    window.reload.location();
                }
                else {
                    swal({
                        position: 'center',
                        type: 'error',
                        title: 'Error, campos por llenar',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    });
});