//This file handles front-end of a specific course
$(function() {

    //Review modal 
    // display the selected range for course and difficulty
    var course_rating_display = $('#course-rating-display');
    var course_rating_range = $('#course-rating-range');
    course_rating_display.html(course_rating_range.val());

    course_rating_range.on('change', function() {
        course_rating_display.html($(this).val());
    });

    // display the selected range for difficulty
    var difficulty_rating_display = $('#difficulty-rating-display');
    var difficulty_rating_range = $('#difficulty-rating-range');
    difficulty_rating_display.html(difficulty_rating_range.val());

    difficulty_rating_range.on('change', function() {
        difficulty_rating_display.html($(this).val());
    });

    //modal buttons
    var review_modal_button = $('#review_modal_btn');
    var save_review_btn = $('#save_review');

    //online checkbox 
    var is_online = $('#online-checkbox');

    //description 
    var description = $('#description');

    //grade selector 
    var grade_recived = $('#grade-recived-selector');

    //set the rating on page load
    setRatings();

    //set defualt values if user has reviewed the course before --> easier for editing 
    if (user_review != null) {
        console.log(user_review);
        review_modal_button.html('Edit Review');
        save_review_btn.html('Save Review');

        course_rating_range.val(user_review['course_rating']);
        course_rating_display.html(course_rating_range.val());

        difficulty_rating_range.val(user_review['difficulty_rating']);
        difficulty_rating_display.html(difficulty_rating_range.val());

        is_online.prop('checked', user_review['online']);
        grade_recived.val(user_review['grade_recived']);

        if (user_review['description'] != "none")
            description.html(user_review['description']);
    }

    //Save the review --> send data to server
    var url = '/courses/'.concat(course['course_code']);
    save_review_btn.on("click", function(e) {
        //online checkbox value
        is_online = $('#online-checkbox').is(':checked');

        //description value
        description = $('#description').val();
        if (description == "") description = "none";

        //grade recivered value
        grade_recived = $('#grade-recived-selector option:selected').text();

        var data = {
            'course_rating': course_rating_range.val(),
            'difficulty_rating': difficulty_rating_range.val(),
            'grade_recived': grade_recived,
            'online': is_online,
            'description': description,
            'course_id': course.id,
            'username': user.username
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: url,
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                course = JSON.parse(response['course']);
                reviews = JSON.parse(response['course_reviews']);
                user = JSON.parse(response['user']);
                setRatings();

                //Set text 
                $('#average_rating').html(course['rating'] + ' / 5');
                $('#total-review-counter').html(reviews.length + ' total reviews');
                review_modal_button.html('Edit Review');

                $('#course_review_modal').modal('hide');
                save_review_btn.html('Save Review');
            }
        });
    });

    //handle rating display 
    function setRatings() {
        //Star rating display
        $('#stars').children().each(function() {
            var $star = $(this);
            if (parseFloat($star.attr('id')) - 0.5 <= parseFloat(course['rating'])) {
                $star.html('star_half');
            }
            if (parseFloat($star.attr('id')) <= parseFloat(course['rating'])) {
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
            let i = Math.round(review.course_rating);
            countStars[i] += 1;
        });

        //set the rating distribution on the front-end 
        let total_reviews = reviews.length;
        if (reviews.length == 0) total_reviews = 1;


        for (let i = 1; i <= 5; i++) {
            let precentage = (countStars[i] / total_reviews) * 100;

            let percentage_text = $('#percentage-' + i);
            let bar = $('#filled-rating-' + i);

            bar.width(precentage + '%');
            percentage_text.html(precentage + '%');

        }
    }

});