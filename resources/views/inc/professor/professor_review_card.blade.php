<div class="review-card card text-center mt-4">
    <div class="review-header card-header">
        <a class="fw-bold" href="">{{ $review->username}}</a>
        <div class="review-card-rating">
            <div class="d-flex lead justify-content-center mb-1 mt-2">
                <div id="stars-{{ $review->id }}">
                    @for ($i = 1; $i <= 5; $i++)
                        <span id="{{ $i }}" class="material-icons-outlined star-rating">star_outlined</span>
                    @endfor
                </div>
            </div>
        </div>
        <div class="review-card-atr">
            <p class="card-text">Difficulty: <span>{{ $review->difficulty_rating}}</span></p>
            <p class="card-text">Recommend: <span>{{ $review->take_again ? 'Yes' : 'No'}}</span></p>
            <p class="card-text">Course: <a class="link" href="{{ $review->related_course_code != 'not specified' ? route('course', $review->related_course_code) : '' }}"><span class="atr">{{ $review->related_course_code}}</a></p>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $review->description}}</p>
    </div>
    <div class="review-footer">
        <div id="review-date-{{ $review->id }}" class="review-date mt-3 lead"></div>
        <div class="review-actions">

            @php ($liked = false) @endphp
            @if(Auth::check())
                @if(isset($likes))
                    @foreach ($likes as $like)
                        @if($like['review_id'] == $review->id)
                            @php ($liked = true) @endphp
                        @endif
                    @endforeach
                @endif
                <a id="likeBtn"class="likeBtn cardBtnEffect" href="#"> 
                    <i id="likeIcon" class="likeIcon nv-22 {{ $liked ? 'material-icons' : 'material-icons-outlined' }}">thumb_up</i>
                    <span id="like_count" >{{ $review->likes }} Like</span>
                    <span id="reviewId" data-data="{{ $review->id }}"></span>
                    <span id="reviewOnwer" data-data="{{ $review->username }}"></span>
                </a>
            @else
                <a id="likeBtn" href="#" class="likeBtn cardBtnEffect"> <i class="nv-22 material-icons-outlined">thumb_up</i><span >{{ $review->likes }} Like</span></a>
            @endif

            <a id="flagBtn" href="#"> <i class="nv-22 material-icons-outlined">flag</i><span>Report</span></a>
        </div>
    </div>
</div>
<hr>
<script src="{{ URL::asset('/js/review/reviewCard.js') }}"></script>
<script>
    var review = @json($review);
    setReviewInfo(review, 'professor');
</script>
