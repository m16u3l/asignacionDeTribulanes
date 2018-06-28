
  <header class="bg-theme-1">
    <nav class="text-white">
      <div class="navbar">
   
        <div class=" col text-center" style="background-color:#2A3F54; color: #ffffff; ">
          <img class="logo d-inline mr-2" src="/images/UMSS.png">
          <h5 class="h5 d-inline"> @yield('head')</h5>
        </div>
        @if (Auth::guest())
          <!--a href="{{ route('login') }}">Login</a></li-->
        @else
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          @endif
      </div>
    </nav>
  </header>
  