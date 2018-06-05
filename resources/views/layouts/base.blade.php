<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> @yield('head')
  <meta name="description" content="Sistema de Asignacion de Tribunales UMSS">
  <meta name="BOY S-Code" content="">

  <link rel="shortcut icon" href="{{ url('static/images/favicon.ico')}}">
  <link href=" {{ url('static/css/icons.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ url ('libraries/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ url('css/body.css')}}">
  <link rel="stylesheet" href="/css/fer_imagen.css">
  <link rel="stylesheet" href="/css/navbar.css"> 
<link href="{{ url('css/pagination.css')}}" rel="stylesheet" type="text/css">
  @yield('child_css')



</head>

<body class="body">
  @if (Auth::guest())
    @include('layouts.header')
    <div class="row " >
         <div class=" offset-sm-4 col-lg-4" style="background-color:#2A3F54; color: #ffffff;
        position: fixed; margin-top:25px ">
        @yield('content')
      </div>
      <div class=" offset-sm-3 col-lg-9">
        
      </div>
    

    </div>
     
     @include('layouts.footer')
  @else
  @include('layouts.header')

    <div class="container-fluid" style="min-height:92vh">
      <div class="row">
        @include('layouts.nav')

        @yield('content')

      </div>
    </div>
    @include('layouts.footer')
  @endif


 



  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="{{ url('libraries/bootstrap/js/bootstrap.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>

  @yield('child_js')



</body>

</html>
