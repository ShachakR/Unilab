<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark h6">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">UNILAB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Profile</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="navbar-nav">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="dropdown nav-item navbar-dark bg-dark">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu navbar-dark bg-dark" role="menu">
                            <li class="nav-item"><a class="nav-link" href="">Settings</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</nav>
