<div id="update_professinal_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          {{--Header--}}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">REGISTRO DE PROFESIONALES</h4>
          </div>
          {{--Body--}}
          <div class="modal-body">
            <form action="/registrar_profesional" method="POST" id="update">
            	{{ csrf_field() }}
              <div class="">
                <input class="form-control" name="id" id="edit_id" type="hidden" value=""/>
              </div>

            	<div class="row">
            	  <div class="offset-lg-2 col-lg-4">
            	    <label for="">C.I</label>
            	    <input class="form-control" name="ci" id="edit_ci" type="text" value=""/>
            	  </div>
            	  <div class="col-lg-4">
            	    <label for="">COD SIS</label>
            	    <input class="form-control" name="cod_sis" id="edit_cod_sis" type="text" value=""/>
            	  </div>
            	</div>

            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Nombre</label>
            	    <input class="form-control" name="name" id="edit_name" type="text" value=""/>
            	  </div>
            	</div>

            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Apellido paterno</label>
            	    <input class="form-control" name="last_name_father" id="edit_last_name_father" type="text" value=""/>
            	  </div>
            	</div>
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Apellido materno</label>
            	    <input class="form-control" name="last_name_mother" id="edit_last_name_mother" type="text" value=""/>
            	  </div>
            	</div>

            	<div class="row">
            	  <div class="offset-lg-2 col-lg-4">
            	    <label for="">Titulo</label>
                  <select id="edit_degree" name="degree" class="form-control" >
                    @foreach($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->acronym}}</option>
                    @endforeach
                  </select>
            	  </div>
            	  <div class="col-lg-4">
            	    <label for="">Carga Horaria</label>
                  <select id="edit_workload" name="workload" class="form-control">
                    <option value="Tiempo Completo">Tiempo Completo</option>
                    <option value="Tiempo Parcial">Tiempo Parcial</option>
                  </select>
            	  </div>
            	</div>

              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">Email</label>
                  <input class="form-control" name="email" id="edit_email" type="text" value=""/>
                </div>
              </div>

              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">Telefono</label>
                  <input class="form-control" name="phone" id="edit_phone" type="text" value=""/>
                </div>
              </div>

              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">Direccion</label>
                  <input class="form-control" name="address" id="edit_address" type="text" value=""/>
                </div>
              </div>

            	<br/>
              {{--Buttons--}}
            	<button class="row offset-lg-4 col-lg-2 btn bg-theme-4" id="update1" type="submit">Aceptar</button>
              <button class=" col-lg-2 btn bg-theme-1" id="cancel_edit_professional" type="button">Cancelar</button>
            </form>
          </div>
          {{--End Body--}}
        </div>
      </div>
    </div>
  </div>
</div>
