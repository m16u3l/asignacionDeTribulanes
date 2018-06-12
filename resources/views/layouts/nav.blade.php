

      <div class="col-2 px-0 collapse show in bg-theme-1" id="sidebar" style="min-height:92vh;">
        <div class="list-group panel">
          <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Perfiles</span> </a>
          <div class="collapse" id="menu1">          
            <a href="{{ route ('list_profile')}}" class="list-group-item" data-parent="#menu1">Sin tribunales</a>
            <a href="{{ route ('list_profile_asigned')}}" class="list-group-item" data-parent="#menu1">Con tribunales</a>
            <a href="{{ route ('list_profile_finalized')}}" class="list-group-item" data-parent="#menu1">Finalizados</a>
          </div>

          <a href="#menu3" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Carga de datos</span></a>
          <div class="collapse" id="menu3">
            <a href="{{ route ('import_professionals')}}" class="list-group-item" data-parent="#menu3">Profesionales</a>

            <a href="{{ route ('import_areas')}}" class="list-group-item" data-parent="#menu3">Areas</a>

            <a href="{{ route ('import_periods')}}" class="list-group-item" data-parent="#menu3">Periodos</a>

            <a href="{{ route ('import_modalities')}}" class="list-group-item" data-parent="#menu3">Modalidades</a>
         
            <a href="{{ route ('import_profiles')}}" class="list-group-item" data-parent="#menu3">Perfiles</a>
          </div>
          <br>
          <a href="{{ route ('lista_perfiles')}}" class="list-group-item">Perfiles</a>
          <a href="{{ route ('lista_areas')}}" class="list-group-item" >Areas</a>
          <a href="{{ route ('lista_profesionales')}}" class="list-group-item" >Profesionales</a>
        </div>
      </div>