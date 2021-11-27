<nav class="nav-body navbar fixed-top">
    <div class="container-fluid">
        <div class="ml-4">
            <a class="navbar-brand" style="font-family: 'Crete Round', serif" href="{{ url('/') }}">UNILAB</a>
        </div>

        <div>
            @if (Auth::guest())
                <div>
                    <a class="nav-item-top" href="{{ route('login') }}">Log in</a>
                    <a class="nav-item-top" href="{{ route('register') }}">Register</a>
                </div>
                @else
                <div class="dropdown">
                    <button class="nav-item-top dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->username }}
                      </button>   
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="material-icons-outlined nv-icon-22">logout</i> <span class="ml-3">Logout </span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item" href=""> <i class="material-icons-outlined nv-icon-22">settings</i> <span class="ml-3">Settings</span></a>
                    </div>             
                </div>
            @endif
        </div>

    </div>
</nav>
