@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-center mb-3 mt-3">
            <h5>{{ $university->name }} - Professors</h5>
        </div>
        @include('inc.layouts.type_add', ['type' => 'Professor', 'input' => 'Full Name', 'placeholder' => 'Alex Painter'])
        <div class="mb-1">
            <input name="search-bar" id="searchbox-input" type="text" class="form-control"
                placeholder="Search Professors..." aria-label="University">
        </div>
        @foreach ($professors as $professor)
            <div class="card main-card">
                <a class="bookmark-icon font-size-30"><i id='icon' class="material-icons-outlined">bookmark_add</i></a></li>
                <div class="card-body lead">
                    <h5 class="card-title ">{{ $professor->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rating: {{ $professor->rating }} / 5</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Reviews: {{ $professor->reviews->count() }}</h6>
                    <a class="stretched-link" href="{{ route('professor', $professor->name) }}"></a>
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ URL::asset('/js/listing.js') }}"></script>
@endsection
