<div id="finalize_profile_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Esta seguro?</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route ('finalizar_perfil')}}" data-parsley-validate novalidate method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div class="form-group">
                <label> Esta seguro que desea finalizar este perfil:  </label>
                <input type="hidden" name="profile_id" id="finalize_profile">
              </div>
              <h5 id="label_title"></h5>
              <div class="row ocultar_mensaje" id="ocultar_mensaje">
                <div class="offset-sm-2 col-sm-8">
                  <label> ingrese la fecha de defensa de perfil </label>
                </div>
              </div>

              <div class="container">
                <div class="row">
                    <div class='offset-lg-3 col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datepicker1'>
                                <input type='hidden'name="date_defended" class="form-control"  id="date_defended"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group text-right m-b-0">
                <input class="btn btn-lg btn-rounded btn-info waves-effect waves-light" type="button" value="si" id="buton_date_defended">
                <input class="btn btn-lg btn-rounded btn-info waves-effect waves-light" type="hidden" value="ok" id="buton_save">
                <button type="reset" class="btn btn-lg btn-rounded btn-danger waves-effect waves-light m-l-5" data-dismiss="modal">
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
