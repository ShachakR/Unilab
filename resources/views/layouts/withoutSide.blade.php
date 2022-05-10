@extends('./layouts.app')

@section('main-container')
    <div class="filler-left"></div>
    <div class="side-content-left"></div>
    <div class="content"> @yield('content')</div>
    <div class="filler-right"></div>
@endsection