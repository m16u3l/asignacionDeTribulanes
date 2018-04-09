<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        @if ( empty($professionals[0]))
          <h1>no hay ningun docente pertinente al area</h1>
        @else
          @foreach($professionals as $professional)
            <li class="list-group-item list-group-item-action element-bg mb-3">
              <div class="row">
                <div class="col-12 col-lg-11 text-justify">
                  <div class="perfil col-4 col-lg-4">
                    <label class="bold texto">Profecional:</label> <br>
                    <label class="bold texto">carga de perfiles:</label><br>
                    <label class="bold texto">areas de interes:</label>
                  </div>
                  <div class="perfil  col-6 col-lg-6">
                    <label class=" texto">{{$professional->name}}  {{$professional->last_name_father}} {{$professional->last_name_mother}}</label><br>
                    <label class=" texto">{{$professional->count}} perfiles</label><br>
                    <label class=" texto"></label>
                  </div>
                </div>
                </div>
            </li>
            @endforeach
          @endif

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
