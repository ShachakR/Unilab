<div class="review-card card text-center mt-4">
    <div class="review-header card-header">
        <a class="fw-bold" href="/{{ $review->username }}">{{ $review->username}}</a>
        <div class="review-card-rating">
            <div class="d-flex lead justify-content-center mb-1 mt-2">
                <div id="stars-{{ $review->id }}">
                    @include('inc.review.star_rating')
                </div>
            </div>
        </div>
        <div class="review-card-atr">
            @yield('review-content')
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
                <a id="likeBtn"class="likeBtn cardBtnEffect" href="#" onclick="likeReview(this, {{ $review }})"> 
                    <i id="likeIcon" class="likeIcon nv-22 {{ $liked ? 'material-icons' : 'material-icons-outlined' }}">thumb_up</i>
                    <span id="like_count" >{{ $review->likes }} Like</span>
                </a>
            @else
                <a id="likeBtn" href="#" class="likeBtn cardBtnEffect"> <i class="nv-22 material-icons-outlined">thumb_up</i><span >{{ $review->likes }} Like</span></a>
            @endif

            <a id="flagBtn" href="#" class="cardBtnEffect" onclick="flagReview({{ $review }})"> 
                <i class="nv-22 material-icons-outlined">flag</i>
            </a>
        </div>
    </div>
</div>
<hr>
<script>
    var review = @json($review);
    var review_type = @json($review_type);
    setReviewInfo(review, review_type);
</script>