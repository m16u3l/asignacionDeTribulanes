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
                <label> Esta seguro que desea finalizar este perfil  </label>
                <input type="hidden" name="profile_id" id="finalize_profile">
              </div>
              <div class="form-group text-right m-b-0">
                <button class="btn btn-lg btn-rounded btn-danger waves-effect waves-light" type="submit" id="boton_eliminar_form">
                  Si
                </button>
                <button type="reset" class="btn btn-lg btn-rounded btn-default waves-effect waves-light m-l-5" data-dismiss="modal">
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
