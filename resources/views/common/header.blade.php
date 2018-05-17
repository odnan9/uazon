<!-- Main header -->
<div class="container">
  <div class="row" style="height: 6em;">
    <!-- Logo -->
    <div class="col-md-2">
      <a class="" href="{{ route('home') }}">
        <img class="img-responsive" src="storage/images/logo.png" style="height: 6em">
      </a>
    </div>
    <div class="col-md-10">
      <nav class="navbar navbar-static-top" style="height: 6em">

        <div class="collapse navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endguest
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="row">
    <!-- Navigation -->
    @include('common.navigation')

    <!-- Search Widget -->
    @include('common.search_widget')
  </div>
</div>
