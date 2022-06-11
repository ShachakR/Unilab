//This file handles front-end of a specific professor
$(function () {

    //Review modal 
    // Get elements 
    var professor_rating_display = $('#professor-rating-display');
    var professor_rating_range = $('#professor-rating-range');

    var difficulty_rating_display = $('#difficulty-rating-display');
    var difficulty_rating_range = $('#difficulty-rating-range');

    setRangeSlider(professor_rating_range, professor_rating_display, professor_rating_range.val());
    setRangeSlider(difficulty_rating_range, difficulty_rating_display, difficulty_rating_range.val());

    //modal buttons
    var add_review_btn = $('#add_review');
    var save_review_btn = $('#save_review');

    //take_again checkbox 
    var take_again = $('#take_again-checkbox');

    //description 
    var description = $('#description');

    //set the rating on page load
    setRatings(professor['rating'], reviews, 'professor');

    //set defualt values if user has reviewed the professor before --> easier for editing 
    if (user_review != null) {
        add_review_btn.html('Edit Review');
        save_review_btn.html('Save Review');

        setRangeSlider(professor_rating_range, professor_rating_display, user_review['professor_rating']);
        setRangeSlider(difficulty_rating_range, difficulty_rating_display, user_review['difficulty_rating']);

        take_again.prop('checked', user_review['take_again']);
        $('#course_search_field').val(user_review['related_course_code']);

        if (user_review['description'] != "none")
            description.html(user_review['description']);
    }

    //set autocomplete for course search
    let courses = [];
    let course_names = [];

    function setData(data) {
        courses = JSON.parse(data['data']);

        for (var i = 0; i < courses.length; i++) {
            course_names[i] = courses[i]['name'];
        }

        autocomplete(document.getElementById('course_search_field'), courses, 'course_code');
    }

    var url = '/GlobalResource/GetCourses';

     const filter = {
         'university_id': professor['university_id']
     }
     
     restProtc("PUT", filter, url, setData);

    var postReviewHandler = function (response) {
        professor = JSON.parse(response['professor']);
        reviews = JSON.parse(response['professor_reviews']);
        setRatings(professor['rating'], reviews, 'professor');

        //Set text for review distribution and ratings
        $('#average_rating').html(professor['rating'] + ' / 5');
        $('#total-review-counter').html(reviews.length + ' total reviews');
        add_review_btn.html('Edit Review');

        $('#review_modal').modal('hide');
        save_review_btn.html('Save Review');
    }

    //Save the review --> send data to server
    var url = '/professors/'.concat(professor['name']);
    save_review_btn.on("click", function (e) {
        //take_again checkbox value
        take_again = $('#take_again-checkbox').is(':checked');

        //description value
        description = $('#description').val();
        if (description == "") description = "no comment";

        related_course_code = $('#course_search_field').val(); 
        if (related_course_code == "") related_course_code = "not specified";

        var data = {
            'professor_rating': professor_rating_range.val(),
            'difficulty_rating': difficulty_rating_range.val(),
            'take_again': take_again,
            'description': description,
            'professor_id': professor.id,
            'username': user['username'],
            'related_course_code': related_course_code
        }

        restProtc('PUT', data, url, postReviewHandler);

    });
});