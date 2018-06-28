<div id="finalize_profile_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">CONFIRMACION DE FINALIZACION DE PERFIL</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route ('finalizar_perfil')}}" data-parsley-validate novalidate method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div class="form-group">
                <h6>¿Esta seguro de que desea dar por finalizado este perfil?: </h6>
                <input type="hidden" name="profile_id" id="finalize_profile">
              </div>
              <h6 class="text-center" id="label_title"></h6>
              <div class="row ocultar_mensaje" id="ocultar_mensaje">
                <div class="col">
                  <p class="text-center">Ingrese la fecha de defensa del perfil </p>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class='offset-lg-3 col-sm-6'>
                    <div class="form-group">
                      <div class='input-group date' id='datepicker1'>
                        <input type='hidden' name="date_defended" class="form-control" id="date_defended" />
                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group text-right m-b-0">
                <input class="btn  bg-theme-4 waves-effect waves-light" type="button" value="Aceptar" id="buton_date_defended" style="color:white">
                <input class="btn  bg-theme-4 waves-effect waves-light" type="hidden" value="Aceptar" id="buton_save" style="color:white">
                <button type="reset" class="btn bg-theme-1 waves-effect waves-light m-l-5" data-dismiss="modal">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>