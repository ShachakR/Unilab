@extends('layouts.app')

@section('content')
    <div class="container mr-0">

        <div class="row justify-content-center align-middle">
            <div class="col-ld-8 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center mb-3 mt-3">
                        <h5>{{ $profile->university_name != null ? $profile->university_name : '' }} </h5>
                    </div>
                    @foreach ($courses as $course)
                        <div class="card">
                            <a class="bookmark-icon font-size-30" href=""><i class="material-icons">bookmark_border</i></a></li>
                            <div class="card-body lead">
                                <h5 class="card-title ">{{$course->course_code}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Rating: </h6>
                                <h6 class="card-subtitle mb-2 text-muted">Reviews: </h6>
                              </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
