@extends('./layouts.app')

@section('main-container')
    <div class="filler-left-no-side"></div>
    <div id="content" class="content">
        <div class="container mr-0">
            <div class="row justify-content-center align-middle">
                <div class="col-ld-8 mt-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div class="filler-right"></div>
@endsection
