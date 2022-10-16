@extends('./inc.review.reviewCard', ['review_type' => 'course'])

@section('review-content')
<p class="card-text">Difficulty: <span class="atr">{{ $review->difficulty_rating}}</span></p>
<p class="card-text">Grade: <span class="atr">{{ $review->grade_recived}}</span></p>
<p class="card-text">Online: <span class="atr">{{ $review->online ? 'Yes' : 'No'}}</p>
<p class="card-text">Taken With: <a class="link" href="{{ $review->related_professor_name != 'not specified' ? route('professor', $review->related_professor_name) : '' }}"><span class="atr">{{ $review->related_professor_name}}</a></p>
@endsection