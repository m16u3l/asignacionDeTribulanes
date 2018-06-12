<div id="send_mail_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">ENVIAR CORREO</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route ('send_mail')}}" data-parsley-validate novalidate method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div class="form-group">
                <label> Se enviara un correo electronico a: leticia.blanco@gmail.com</label>
                <input type="hidden" name="profile_id" id="send_mail"/>
                <input type="hidden" name="title" id="title_mail"/>
                <input type="hidden" name="students" id="student_mail"/>
                <input type="hidden" name="tutors" id="tutors_mail"/>
                <input type="hidden" name="tribunal" id="tribunal_mail"/>
                <input type="hidden" name="date_asignate" id="date_asignate"/>
              </div>
              <div class="form-group text-right m-b-0">
                <button class="row offset-lg-4 col-lg-2 btn btn-primary" id="enviar1" type="submit"> Enviar</button> 
                <button class=" col-lg-2 btn btn-danger" id="cancelar_envio" type="button"> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>