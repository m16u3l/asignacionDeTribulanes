 $(document).ready(function(){
   /* Validations */
   $("#edit_name").addClass("input-text");
   $("#edit_last_name_father").addClass("input-text");
   $("#edit_last_name_mother").addClass("input-text");
   $("#edit_ci").addClass("input-number");
   $("#edit_cod_sis").addClass("input-number");
   $("#edit_email").change(function(){
     response = _email_validate($('#email').val());
     _show_message(response);
   });
  
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
       $("#edit_workload").val("Tiempo Parcial");
     }
     
     if($(this).data("workload")=="Tiempo Completo"){
       $("#edit_workload").val("Tiempo Completo");
     }
   });
   // update professional ajax
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
   // Close modal
   $("#cancel_edit_professional").on('click', function(){
     $('#update_professinal_modal').modal('toggle');
   });
   
   // Private methods
   function _email_validate(input) {
    console.log(input);
    var numericExpression = /^w.+@[a-zA-Z_-]+?.[a-zA-Z]{2,3}$/;
    if (input.match(numericExpression))
      return true;
    return false;
   }
  
   function _show_message(response) {
     if (!response) {
       swal({
         position: 'center',
         type: 'error',
         title: 'email invalido',
         showConfirmButton: false,
         timer: 1500
       });
       $("#edit_email").val("");
     }
   }
 });
