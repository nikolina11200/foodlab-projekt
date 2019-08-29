<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:  #d9ce95;">
        <a class="navbar-brand" href="#">FoodLab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="{{ Request::is('/') ? "active" : "" }}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="{{ Request::is('foodlab') ? "active" : "" }}">
                <a class="nav-link" href="/foodlab">Foodlab <span class="sr-only">(current)</span></a>
            </li>
            <li class="{{ Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="{{ Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            @if (auth()->user()->isAdmin == 1)
            <li class="nav-item">
        <a class="nav-link" href="{{ route('admin_posts.create') }}">
        Create New Recipe
        </a>
        @else 
        <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.create') }}">
        Create New Recipe
        </a>
        @endif
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hello {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
        @if (auth()->user()->isAdmin == 1)
          <li><a class="dropdown-item" href="{{ route('admin_posts.index') }}">Recipes</a></li>
          <hr>
          @endif
          <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                
                </li>
        </ul>
        </li>
        @else

          <a href="{{ route('login') }}" class="btn btn-default">Login</a>
          <a href="{{ route('register') }}" class="btn btn-default">Register</a>
        @endif

      </ul>
        </div>
        </nav>