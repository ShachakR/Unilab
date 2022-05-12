<div class="review-card card text-center mt-4">
    <div class="review-header card-header">
        <a class="fw-bold" href="">{{ $review->username}}</a>
        <div class="review-card-rating">
            <div class="d-flex lead justify-content-center mb-1 mt-2">
                <div id="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span id={{ $i }} class="material-icons-outlined star-rating">star_outlined</span>
                    @endfor
                </div>
            </div>
        </div>
        <div class="review-card-atr">
            <p class="card-text">Difficulty: <span class="atr">{{ $review->difficulty_rating}}</span></p>
            <p class="card-text">Grade: <span class="atr">{{ $review->grade_recived}}</span></p>
            <p class="card-text">Online: <span class="atr">{{ $review->online ? 'Yes' : 'No'}}</p>
            <p class="card-text">Taken With: <a class="link" href="{{ $review->related_professor_name != 'not specified' ? route('professor', $review->related_professor_name) : '#' }}"><span class="atr">{{ $review->related_professor_name}}</a></p>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $review->description}}</p>
    </div>
    <div class="review-footer">
        <div class="review-date mt-3 lead">
            {{ $review->created_at}}
        </div>
        <div class="review-actions">
            <a href="#"> <i class="nv-22 material-symbols-outlined">thumb_up</i><span>Like</span></a>
            <a href="#"> <i class="nv-22 material-symbols-outlined">flag</i><span>Report</span></a>
        </div>
    </div>
</div>
<hr>
<script src="{{ URL::asset('/js/course/review_card.js') }}"></script>
