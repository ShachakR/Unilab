@extends('layouts.app')

@section('content')
    <div class="container mr-0">

        <div class="row justify-content-center align-middle">
            <div class="col-ld-8 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center mb-3 mt-3">
                        <h5>{{ $profile->university_name }} </h5>
                    </div>
                    @include('inc.course.course_add')
                    <div class="mb-1">
                        <input name="search-bar" id="searchbox-input" type="text" class="form-control"
                            placeholder="Search Courses..." aria-label="University">
                    </div>
                    @foreach ($courses as $course)
                        <div class="card main-card">
                            <a class="bookmark-icon font-size-30"><i id='icon'
                                    class="material-icons-outlined">bookmark_add</i></a></li>
                            <div class="card-body lead">
                                <h5 class="card-title ">{{ $course->course_code }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Rating: {{ $course->rating }} / 5</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Reviews: {{ $course->reviews->count() }}</h6>
                                <a class="stretched-link" href="{{ route('course', $course->course_code) }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('/js/listing.js') }}"></script>
@endsection