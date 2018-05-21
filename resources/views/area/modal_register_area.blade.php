<div id="register_area_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">REGISTRO DE AREAS</h4>
          </div>
          <div class="modal-body">
            <form action="/registrar_profesional" method="POST" id="register_area">
            	{{ csrf_field() }}

            	<div class="row">
            	  <div class="offset-lg-2 col-lg-8">
            	    <label for="">Nombre de area</label>
            	    <input class="form-control" name="name" id="name" type="text" value=""/>
            	  </div>
            	</div>

            	<div class="row">
                <div class="offset-lg-2 col-lg-8">
                  <label for="">descripcion:</label>
                  <textarea class="form-control" rows="5"name="description" id="description"></textarea>
                </div>

            	</div>

            	<br/>
            	<button class="row offset-lg-2 col-lg-2 btn btn-primary" id="button_register_area" type="submit"> Registrar</button>

          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
