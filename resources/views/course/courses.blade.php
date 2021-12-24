@extends('layouts.app')

@section('content')
    <div class="container mr-0">

        <div class="row justify-content-center align-middle">
            <div class="col-ld-8 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center mb-3 mt-3">
                        <h5>{{ $profile->university_name != null ? $profile->university_name : '' }} </h5>
                    </div>
                    <div class="mb-1">
                        <input name="search-bar" id="searchbox-input" type="text" class="form-control"
                            placeholder="Search Courses..." aria-label="University">
                    </div>
                    @foreach ($courses as $course)
                        <div class="card course-card">
                            <a class="bookmark-icon font-size-30"><i class="material-icons">bookmark_border</i></a></li>
                            <div class="card-body lead">
                                <h5 class="card-title ">{{ $course->course_code }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Rating: </h6>
                                <h6 class="card-subtitle mb-2 text-muted">Reviews: </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#searchbox-input').on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".course-card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
