@extends('layouts.withoutSide')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-center mb-3 mt-3">
            <h5>Select University</h5>
        </div>
        @include('inc.add-university-modal')

        <div class="mb-1">
            <input name="search-bar" id="searchbox-input" type="text" class="form-control" placeholder="Search Universities..."
                aria-label="University">
        </div>

        
        @if (!Auth::guest() && $user_university)
        <div class="card main-card">
            <div class="card-body lead">
                <h5 class="card-title text-primary">{{ $user_university->name }}</h5>
            </div>
        </div>
        @endif

        @foreach ($universities as $university)
        @if (!Auth::guest() && $user_university != $university)
            <div class="card main-card">
                <div class="card-body lead">
                    <h5 class="card-title">{{ $university->name }}</h5>
                </div>
            </div>
        @elseif(Auth::guest()) 
            <div class="card main-card">
                <div class="card-body lead">
                    <h5 class="card-title">{{ $university->name }}</h5>
                </div>
            </div>
        @endif
        @endforeach
    </div>
    <script src="{{ URL::asset('/js/landing/landing.js') }}"></script>
    <script src="{{ URL::asset('/js/listing.js') }}"></script>
@endsection