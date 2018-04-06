@section('headAndTittle')

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignacion de Tribunales UMSS</title>
  <meta name="description" content="Sistema de Asignacion de Tribunales UMSS">
  <meta name="BOY S-Code" content="">

  <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/body.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="libraries/bootstrap/js/bootstrap.js"></script>
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body class="body">
  <header>
    <nav class="bg-danger text-white">
      <div class="container-fluid">
        <div class="row navbar">
          <div class="offset-md-2 col-md-8 text-center">
            <h4 class="h4"> ASIGNACION DE TRIBUNALES PARA PROYECTOS FINALES DE GRADO</h4>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary float-right">Sign In</button>
          </div>
        </div>
      </div>
    </nav>
  </header>
@show

@section('navbar')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="sidebar">

            <ul class="navbar-nav flex-column">
              <li class="nav-item">
                <img class="img-thumbnail" src="http://www.umss.edu.bo/wp-content/uploads/2017/09/cropped-LogoBaseBlanca.png">
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Test</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Analytics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Export</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      @yield('content')

    </div>
  </div>
@show

@section('footer')
  <footer class="footer fixed-bottom">
    <div class="container">
      <span class="text-muted">BOY S-Code™</span>
    </div>
  </footer>
  <script src="js/scripts.js"></script>
@show
</body>

</html>
