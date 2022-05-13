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