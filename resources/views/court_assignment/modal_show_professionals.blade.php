<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        @if ( empty($professionals[0]))
          <h2>No hay ningun docente pertinente al area</h2>
        @else
          @foreach($professionals as $professional)
            <li class="list-group-item list-group-item-action element-bg mb-3">
              <form id="asignar" action="{{$url}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <input type="hidden" name="profile_id" value="{{$profile->id}}">
                <input type="hidden" name="professional_id" value="{{$professional->id}}  ">
              </form>
              <div class="row">
                <div class="col-12 col-lg-10 text-justify">
                  <div class="perfil col-12 col-lg-4">
                    <label class="h6 texto">Profesional:</label> <br>
                  </div>
                  <div class="col-12 col-lg-8">
                    <label class=" texto">{{$professional->name}}  {{$professional->last_name_father}} {{$professional->last_name_mother}}</label><br>
                  </div>
                  <div class="perfil col-12 col-lg-4">
                    <label class="h6 texto">Carga de perfiles:</label><br>
                  </div>
                  <div class="col-12 col-lg-8">
                    <label class=" texto">{{$professional->count}} perfiles</label><br>
                  </div>
                  <div class="perfil col-12 col-lg-4">
                    <label class="h6 texto">Areas de interes:</label>
                  </div>
                  <div class="perfil  col-6 col-lg-6">

                    <label class=" texto"></label>
                  </div>
                </div>
                <div class="col-12 col-lg-2 text-center">
                  <button class="btn btn-link " id="save"><i class="mas fa fa-plus-circle"></i></button>
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
