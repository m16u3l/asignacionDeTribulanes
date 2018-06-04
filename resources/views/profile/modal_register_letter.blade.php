<div id="letter_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="row">
        <div class="col-lg-12">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" >REGISTRO DE CARTAS</h4>
          </div>
          {{--Body--}}
          <div class="modal-body">
            <h4 class="container" id="letter_title"></h4>
            <br>

            <label for="">CARTAS REQUERIDAS</label>
            	<div class="row container" id="div_letter">

            	</div>
              <div class="row container">
                <div class="row offset-1 col-md-11">
                  <div class="col-md-9">
                    <label for="">carta de docente de la materia</label>
                  </div>
                  <div class="col-md-2">
                    <input type="checkbox" name="" value="false" id="letter_teacher" >
                  </div>
                </div>
            	</div>

              <div class="row container" id="div_letter_supervisor" >
                <div class="row offset-1 col-md-11">
                  <div class="col-md-9">
                    <label for="">carta de supervisor de trabajo</label>
                  </div>
                  <div class="col-md-2">
                    <input type="checkbox" name="" value="false" id="letter_supervisor" >
                  </div>
                </div>
            	</div>

              <br>
  
              <a class="offset-lg-6 col-lg-1 btn btn-success"  id="confirm_letter" href="#"><i class="fa fa-check"></i></a>
              <a class="col-lg-1 btn btn-danger" data-dismiss="modal"  href="#"><i class="fa fa-times"></i></a>
          </div>
          {{--End Modal Body--}}
        </div>
      </div>
    </div>
  </div>
</div>
