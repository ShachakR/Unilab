@extends('./layouts.app')

@section('main-container')
        <div id="filler-left" class="filler-left"></div>
        <div id="side-content-left" class="side-content-left">@include('inc.sidenav')</div>
        <div id="content" class="content"> @yield('content')</div>
        <div id="filler-right" class="filler-right"></div>
@endsection
