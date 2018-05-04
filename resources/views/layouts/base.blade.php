<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @yield('head')
  <meta name="description" content="Sistema de Asignacion de Tribunales UMSS">
  <meta name="BOY S-Code" content="">

  <link rel="shortcut icon" href="{{ url('static/images/favicon.ico')}}">
  <link href=" {{ url('static/css/icons.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ url ('libraries/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/body.css')}}">
  <link rel="stylesheet" href="/css/fer_imagen.css">
  <link rel="stylesheet" href="/css/navbar.css">

  @yield('child_css')



</head>

<body class="body">

<!--header-bar-->
  <header class="bg-theme-1">
    <nav class="text-white">
      <div class="navbar">
        <div class="col-md-2 col-2">
          <a href="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-lg"></i></a>
        </div>
        <div class=" col text-center" style="background-color:#2A3F54; color: #ffffff">
          <img class="logo d-inline mr-2" src="/images/UMSS.png">
          <h6 class="h6 d-inline"> ASIGNACION DE TRIBUNALES</h6>
        </div>
      </div>
    </nav>
  </header>
<!--end header-bar-->


  <div class="container-fluid">
    <div class="row">
      <!--sidebar-->
      <div class="col-2 px-0 collapse show in bg-theme-1" id="sidebar" style="heigth: 100vh" >
        <div class="list-group panel">
          <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Listas de perfiles</span> </a>
          <div class="collapse" id="menu1">
            <a href="{{ route ('list_profiles')}}" class="list-group-item" data-parent="#menu1">Perfiles sin tribunales</a>
            <a href="{{ route ('list_profiles_asigned')}}" class="list-group-item" data-parent="#menu1">Perfiles con tribunales asignados</a>
          </div>

          <a href="#menu3" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Carga de datos</span></a>
          <div class="collapse" id="menu3">
            <a href="{{ route ('import_profiles')}}" class="list-group-item" data-parent="#menu3">Perfiles</a>

            <a href="{{ route ('import_professionals')}}" class="list-group-item" data-parent="#menu3">Profesionales</a>
          </div>
        </div>
      </div>
      <!--end sidebar-->

        @yield('content')


    </div>
  </div>

  <footer class="footer fixed-bottom">
    <div class="container">
      <span class="text-muted">BOY S-Code™</span>
    </div>
  </footer>






  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="{{ url('libraries/bootstrap/js/bootstrap.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
  @yield('child_js')

</body>

</html>
