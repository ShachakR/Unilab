<nav class="nav-body navbar fixed-top navbar-expand-sm navbar-light bg-light h4">
    <div class="container-fluid">
        <div>
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">UNILAB</a>
            @else
            <a class="navbar-brand" href="{{ url('/home') }}">UNILAB</a>
            @endif
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto align-items-stretch">
                    @if (Auth::guest())
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}"> <i class="{{ request()->is('home') ? 'material-icons nv-icon' : 'material-icons-outlined nv-icon' }}">home</i> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('profile', Auth::user()->username ) }}"> <i class="{{ request()->is('profile', Auth::user()->username ) ? 'material-icons nv-icon' : 'material-icons-outlined nv-icon' }}">person</i> Profile </a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto ">
                    @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="material-icons-outlined nv-icon">expand_more</i>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="nav-item">
                                <a class="nav-link drop-menu" href=""><i class="material-icons-outlined nv-icon">settings</i>Settings</a></li>
                            <li class="nav-item">
                                <a class="nav-link drop-menu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="material-icons-outlined nv-icon">logout</i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>

    </div>
</nav>
