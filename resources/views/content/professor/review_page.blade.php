@extends('layouts.main')
<script src="{{ URL::asset('/js/review/reviewCard.js') }}"></script>
@section('content')
    @include('inc.review.report')
    <div class="card">
        <div class="d-flex lead justify-content-center mb-3 mt-3">
            <h4>{{ $professor->name }}</h4>
        </div>
        <div class="d-flex lead justify-content-center mb-1 mt-2">
            <div id="stars">
                @for ($i = 1; $i <= 5; $i++)
                    <span id={{ $i }} class="material-icons-outlined star-rating">star_outlined</span>
                @endfor
            </div>
            <h5 id="average_rating" class="ml-4"> {{ $professor->rating }} / 5</h5>
        </div>

        <div class="d-flex flex-column lead justify-content-center align-items-center mb-3 mt-1">
            <h6 id="total-review-counter" class="mt-0 mb-2" style="color: #0d6efd">
                {{ $professor->reviews->count() }} total reviews</h6>
            @for ($i = 5; $i >= 1; $i--)
                <div id="rating-dist-table"
                    class="rating-distribution d-flex flex-row mt-1 mb-2 justify-content-center"
                    style="width: 100%">
                    <h6 style="width:42px; color: #0d6efd" class="flex-start mt-0 mb-0 mr-2">{{ $i }}
                        Star</h6>
                    <div class="dist-bar-background">
                        <div class="dist-bar-filled" id='filled-rating-{{ $i }}'> </div>
                    </div>
                    <h6 id="percentage-{{ $i }}" class="flex-end mt-0 mb-0 ml-2"
                        style="width:42px; color: #0d6efd">0%</h6>
                </div>
            @endfor
        </div>
        @include('inc.professor.professor_review')
        <h2 class="review-title">Reviews</h2>
        <div class="reviews">
            @foreach ( $professor->reviews as $review)
                @include('inc.professor.professor_review_card')
            @endforeach
        </div>
    </div>
<script>
    var type = 'professor';
    var professor = @json($professor);
    var reviews = @json($professor->reviews);
    var user = @isset($user) @json($user) @else null @endif;
    var user_review = @isset($user_review) @json($user_review)  @else null @endif;
</script>
<script src="{{ URL::asset('/js/review/review_page.js') }}"></script>
<script src="{{ URL::asset('/js/professor/professor.js') }}"></script>
@endsection
