@include('inc.auth.login-modal')</div>
@include('inc.auth.register-modal')</div>
@include('inc.nav.select-university-modal')
<nav class="nav-body navbar fixed-top">
    <div class="container-fluid">
        <div class="ml-4">
            <a class="navbar-brand" style="font-family: 'Crete Round', serif" href="{{ url('/') }}">UNILAB</a>
        </div>
        <div>
            <button id="select-modal-btn" type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#select-university-modal">
            </button>
        </div>
        <div>
            @if (Auth::guest())
                <div>
                    <button type="button" class="nav-item-top" data-bs-toggle="modal" data-bs-target="#login-modal">
                        Login
                    </button>
                    <button type="button" class="nav-item-top" data-bs-toggle="modal" data-bs-target="#register-modal">
                        Register
                    </button>
                </div>
            @else
                <div class="dropdown">
                    <button class="nav-item-top dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="material-icons-outlined nv-icon-22">logout</i> <span
                                class="ml-3">Logout </span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item" href=""> <i class="material-icons-outlined nv-icon-22">settings</i>
                            <span class="ml-3">Settings</span></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="{{ URL::asset('/js/nav/select-university.js') }}"></script>
</nav>
