//handle displaying the ratings 
function setRatings(ratingValue, reviews, type) {
    //Star rating display
    $('#stars').children().each(function() {
        var $star = $(this);
        if (parseFloat($star.attr('id')) - 0.5 <= ratingValue) {
            $star.html('star_half');
        }
        if (parseFloat($star.attr('id')) <= ratingValue) {
            $star.html('star');
        }
    });

    //rating distribution 
    let countStars = [] //each [i] represents how many reviews fall under the ith star rating

    //init to 0's
    for (let i = 1; i <= 5; i++) {
        countStars[i] = 0;
    }

    //count 
    reviews.forEach(review => {
        let rating = 0;

        switch (type) {
            case 'professor':
                rating = review['professor_rating'];
                break;
            case 'course':
                rating = review['course_rating'];
                break;
        }

        let i = rating;
        countStars[i] += 1;
    });

    //set the rating distribution on the front-end 
    let total_reviews = reviews.length;
    if (reviews.length == 0) total_reviews = 1;


    for (let i = 1; i <= 5; i++) {
        let precentage = (countStars[i] / total_reviews) * 100;
        precentage = Math.round(precentage);
        
        let percentage_text = $('#percentage-' + i);
        let bar = $('#filled-rating-' + i);

        bar.width(precentage + '%');
        percentage_text.html(precentage + '%');

    }
}

//handle displaying range sliders --> used in modals 
function setRangeSlider(range, display, defualtValue) {
    range.val(defualtValue);
    display.html(defualtValue);

    range.on('change', function() {
        display.html($(this).val());
    });
}