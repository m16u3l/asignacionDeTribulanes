
 $(document).ready(function(){
     /* Validations */
     $("#edit_name").addClass("input-text");
     $("#edit_last_name_father").addClass("input-text");
     $("#edit_last_name_mother").addClass("input-text");
     $("#edit_ci").addClass("input-number");
     $("#edit_cod_sis").addClass("input-number");
     //$("#edit_degree").addClass("input-number");
     /* Load */
      $(".modal_update_professional").on('click', function(){
        $("#edit_id").val($(this).data("id"));
        $("#edit_name").val($(this).data("name"));
        $("#edit_last_name_father").val($(this).data("last_name_father"));
        $("#edit_last_name_mother").val($(this).data("last_name_mother"));
        $("#edit_ci").val($(this).data("ci"));
        $("#edit_cod_sis").val($(this).data("cod_sis"));
        $("#edit_email").val($(this).data("email"));
        $("#edit_phone").val($(this).data("phone"));
        $("#edit_address").val($(this).data("address"));
        $("#edit_degree").val($(this).data("degree_id"));

        if($(this).data("workload")=="Tiempo Parcial"){
            console.log("si");
            $("#edit_workload").val("Tiempo Parcial");
        }else if($(this).data("workload")=="Tiempo Completo"){
          console.log("no");
          $("#edit_workload").val("Tiempo Completo");
        }
      });

     $("#update1").on('click', function(e){
   e.preventDefault();
   form = $("#update");
   $.ajax({
       content_type: "application/json",
       url: '/actualizar_profesional',
       type: "POST",
       data: form.serialize(),
       success: function(response){
     if(response.status){
         swal("Actualizacion exitosa!","En: " + response.name, "success");
         $('.swal2-confirm').on('click', function (event2) {
       event2.preventDefault();
       location.reload();
         })
     }
     else{
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

  $("#cancel_edit_professional").on('click', function(){
    $('#update_professinal_modal').modal('toggle');
  });

 });
