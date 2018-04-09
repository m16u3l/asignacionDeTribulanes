
 $(document).on('click', '.edit-modal', function() {
   $('#title').text($(this).data('title'));
   $('#applicant_name').text($(this).data('applicant_name')+'  '+$(this).data('applicant_last_name_father')+'  '+$(this).data('applicant_last_name_mother'));
   $('#tutor_name').text($(this).data('tutor_name')+'  '+$(this).data('tutor_last_name_father')+'  '+$(this).data('tutor_last_name_mother'));
   $('#title_modality').text($(this).data('title_modality'));
   $('#myModal').modal('show');
   $('#objective').text($(this).data('objective'));
   $('#name').text($(this).data('area'));
});
