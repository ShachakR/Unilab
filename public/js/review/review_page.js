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

function setRatingStars(elmid, value){
    let stars_div = document.getElementById(elmid);
    let stars = stars_div.children;
    stars_div.setAttribute('value', value);

    for (var i = 0; i < stars.length; i++) {
        let star = stars[i];
        if (parseFloat(star.getAttribute('id')) <= value) {
            star.innerHTML = 'star';
        }

        star.classList.add('star-rating-hover');

        star.addEventListener('mouseover', function(){
            let value = parseFloat(this.getAttribute('id'))
            stars_div.setAttribute('value', value);
            for (var i = 0; i < stars.length; i++) {
                let star = stars[i];
                if (parseFloat(star.getAttribute('id')) <= value) {
                    star.innerHTML = 'star';
                }else{
                    star.innerHTML = 'star_outlined';
                }
            }
        })     
    };
}

$(function() {
    $('#add_review').on('click', function(){
        if(!user){
            new bootstrap.Modal($('#login-modal')).show();
            return;
        }
        new bootstrap.Modal($('#review_modal')).show();
    });
});