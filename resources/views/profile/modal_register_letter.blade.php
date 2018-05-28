<div id="letter_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="letter_title"></h4>
          </div>
          {{--Body--}}
          <div class="modal-body">
            {{--Form--}}
            <form action="" method="POST" id="register_letter">
            	{{ csrf_field() }}
              <label for="">cartas de tutores</label>
              <br>
              <input class="form-control" name="profile_id" id="profile_id" type="hidden" value=""/>
              <input class="form-control" name="professional_id" id="professional_id" type="hidden" value=""/>
              <input class="form-control" name="valor" id="valor" type="hidden" value=""/>
            	<div class="row container" id="div_letter">

            	</div>
              
              <label for="">carta de docente</label>
              <br>
              <button class="row offset-lg-8 col-lg-2 btn btn-danger" id="register1" type="submit"> cancelar</button>

            </form>
          </div>
          {{--End Modal Body--}}
        </div>
      </div>
    </div>
  </div>
</div>
