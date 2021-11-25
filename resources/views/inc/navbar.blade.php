<nav class="nav-body navbar fixed-top">
    <div class="container-fluid">
        <div>
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">UNILAB</a>
            @else
            <a class="navbar-brand" href="{{ url('/home') }}">UNILAB</a>
            @endif
        </div>

        <div>
                   @if (Auth::guest())
                   <div>
                    <a class="nav-item-top" href="{{ route('login') }}">Log in</a>
                    <a class="nav-item-top" href="{{ route('register') }}">Register</a>
                   </div>
                   @else
                   <div>
                    <a class="nav-item-top" href="{{ route('profile', Auth::user()->username ) }}"> {{Auth::user()->username }}</a>
                    <a class="nav-item-top" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons-outlined nv-icon-28">logout</i>Logout </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                   </div>
                   @endif
        </div>

    </div>
</nav>
