<div id="check_profile_letter_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Verificacion</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route ('verificar_cartas') }}" data-parsley-validate novalidate method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div class="form-group">
                <label> Para la asignacion de tribunal el perfil selecionado debe cumplir con los siguientes requisitos: </label>
                <input type="hidden" name="profile_id" id="finalize_profile">
              </div>

              <div class="checkbox">
                <label><input type="checkbox" value="" >Carta de Docente de la materia</label>
              </div>
            
              @foreach($profile->tutors as $tutor)
              <div class="checkbox">
                <label><input type="checkbox" value="">Carta de Tutor: </label>
                <p class="mb-0 d-inline"> {{$tutor->name}}
                                          {{$tutor->last_name_father}}
                                          {{$tutor->last_name_mother}}
                </p>
              </div>
              @endforeach
              @if($profile->modality->name == 'Adscripción' || $profile->modality->name == 'Trabajo dirijido')
              <div>
                <label><input type="checkbox" value="">Carta de supervisor</label>
              </div>
              @endif
              
              <div class="form-group text-right m-b-0">
                <button class="btn btn-lg btn-rounded btn-danger waves-effect waves-light" type="submit" id="boton_eliminar_form">
                  Continuar
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
