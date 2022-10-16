function likeReview(likeBtn, review) {
    if (!user) {
        new bootstrap.Modal($('#login-modal')).show();
        return;
    }

    if (user['username'] === review['username']) return;

    var likeIcon = likeBtn.querySelector('#likeIcon')
    var likeCount = likeBtn.querySelector('#like_count');

    let user_id = user['id'];
    let review_id = review['id'];

    var data = {
        'user_id': user_id,
        'review_id': review_id,
        'type': type
    }

    let url = '/review/like'

    if (likeIcon.classList.contains('material-icons')) {
        likeIcon.classList.remove('material-icons');
        likeIcon.classList.add('material-icons-outlined');
        likeCount.innerHTML = (parseInt(likeCount.innerHTML) - 1 + ' Like');
        url = '/review/unlike'
    } else {
        likeIcon.classList.add('material-icons');
        likeIcon.classList.remove('material-icons-outlined');
        likeCount.innerHTML = (parseInt(likeCount.innerHTML) + 1 + ' Like');
    }

    restProtc("PUT", data, url, null)
}

function flagReview(review) {
    modal = new bootstrap.Modal($('#report_modal')).show();

    // var data = {
    //     'sent_by_id': user_id,
    //     'review_id': review['id'],
    //     'type': type,
    //     'reason': ,
    //     'comment': 
    // }
}

function setReviewInfo(review, type) {
    //set date format
    var date = new Date(review['created_at']);
    var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date)
    var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(date)
    var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date)

    $('#review-date-' + review['id']).text(`${mo} ${da} ${ye}`);

    var reviewRating = review[type + '_rating'];

    //set review star ratings
    $('#stars-' + review['id']).children().each(function () {
        var $star = $(this);
        if (parseFloat($star.attr('id')) - 0.5 <= reviewRating) {
            $star.html('star_half');
        }
        if (parseFloat($star.attr('id')) <= reviewRating) {
            $star.html('star');
        }
    });
}