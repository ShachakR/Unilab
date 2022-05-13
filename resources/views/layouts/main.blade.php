@extends('./layouts.app')

@section('main-container')
    <div id="filler-left" class="filler-left"></div>
    <div id="side-content-left" class="side-content-left">@include('inc.nav.sidenav')</div>
    <div id="content" class="content">
        <div class="container mr-0">
            <div class="row justify-content-center align-middle">
                <div class="col-ld-8 mt-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div id="filler-right" class="filler-right"></div>
@endsection
