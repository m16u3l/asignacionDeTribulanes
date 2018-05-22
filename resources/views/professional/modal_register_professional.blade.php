<div id="register_professinal_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">REGISTRO DE PROFESIONALES</h4>
          </div>
          <div class="modal-body">
            <form action="/registrar_profesional" method="POST" id="register">
            	{{ csrf_field() }}
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-4">
            	    <label for="">C.I</label>
            	    <input class="form-control" name="ci" id="ci" type="text" value=""/>
            	  </div>
            	  <div class="col-lg-4">
            	    <label for="">COD SIS</label>
            	    <input class="form-control" name="cod_sis" id="cod_sis" type="text" value=""/>
            	  </div>
            	</div>
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Nombre</label>
            	    <input class="form-control" name="name" id="name" type="text" value=""/>
            	  </div>
            	</div>
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Apellido paterno</label>
            	    <input class="form-control" name="last_name_father" id="last_name_father" type="text" value=""/>
            	  </div>
            	</div>
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Apellido materno</label>
            	    <input class="form-control" name="last_name_mother" id="last_name_mother" type="text" value=""/>
            	  </div>
            	</div>
            	<div class="row">
            	  <div class="offset-lg-2 col-lg-4">
            	    <label for="">Titulo</label>
                  <select name="degree" class="form-control" >
                    @foreach($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->acronym}}</option>
                    @endforeach
                  </select>
            	  </div>

            	  <div class="col-lg-4">
            	    <label for="">Carga Horaria</label>
                  <select name="workload" class="form-control">
                    <option value="Tiempo Completo">Tiempo Completo</option>
                    <option value="Tiempo Parcial">Tiempo Parcial</option>
                  </select>
            	  </div>
            	</div>

              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">email</label>
                  <input class="form-control" name="email" id="email" type="email" value=""/>
                </div>
              </div>
              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">telefono</label>
                  <input class="form-control" name="phone" id="phone" type="text" value=""/>
                </div>
              </div>

              <div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">direccion</label>
                  <input class="form-control" name="address" id="address" type="text" value=""/>
                </div>
              </div>
              <br/>
            	<button class="row offset-lg-4 col-lg-2 btn bg-theme-4" id="register1" type="submit"> Registrar</button>
              <button class=" col-lg-2 btn bg-theme-1" id="cancel_register_professional" type="button"> Volver</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
