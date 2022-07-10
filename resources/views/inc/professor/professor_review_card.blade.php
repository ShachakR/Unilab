@extends('./inc.layouts.reviewCard', ['review_type' => 'professor'])

@section('review-content')
<p class="card-text">Difficulty: <span>{{ $review->difficulty_rating}}</span></p>
<p class="card-text">Recommend: <span>{{ $review->take_again ? 'Yes' : 'No'}}</span></p>
<p class="card-text">Course: <a class="link" href="{{ $review->related_course_code != 'not specified' ? route('course', $review->related_course_code) : '' }}"><span class="atr">{{ $review->related_course_code}}</a></p>
@endsection