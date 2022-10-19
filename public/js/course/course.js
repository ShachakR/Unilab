//This file handles front-end of a specific course
$(function() {

    //Review modal 
    // Get elements 
    var course_rating = document.getElementById('course-rating');
    var difficulty_rating = document.getElementById('difficulty-rating');

    setRatingStars('course-rating', 0);
    setRatingStars('difficulty-rating', 0);

    //modal buttons
    var add_review_btn = $('#add_review');
    var save_review_btn = $('#save_review');

    //online checkbox 
    var is_online = $('#online-checkbox');

    //description 
    var description = $('#description');

    //grade selector 
    var grade_recived = $('#grade-recived-selector');

    //set the rating on page load
    setRatings(course['rating'], reviews, 'course');

     //set autocomplete for course search
     var professors = [];
     var professor_names = [];
 
     function setData(data) {
        professors = JSON.parse(data['data']);
        
         for (var i = 0; i < professors.length; i++) {
            professor_names[i] = professors[i]['name'];
         }
 
        autocomplete(document.getElementById('professor_search_field'), professors, 'name');
     }
 
     var url = '/GlobalResource/GetProfessors';

     const filter = {
         'university_id': course['university_id']
     }
     
     restProtc("PUT", filter, url, setData);

    //set defualt values if user has reviewed the course before --> easier for editing 
    if (user_review != null) {
        add_review_btn.html('Edit Review');
        save_review_btn.html('Save Review');

        setRatingStars('course-rating', user_review['course_rating']);
        setRatingStars('difficulty-rating', user_review['difficulty_rating']);

        is_online.prop('checked', user_review['online']);
        grade_recived.val(user_review['grade_recived']);
        $('#professor_search_field').val(user_review['related_professor_name']);

        if (user_review['description'] != "none")
            description.html(user_review['description']);
    }

    var postReviewHandler = function(response) {
        course = JSON.parse(response['course']);
        reviews = JSON.parse(response['course_reviews']);
        setRatings(course['rating'], reviews, 'course');

        //Set text for review distribution and ratings
        $('#average_rating').html(course['rating'] + ' / 5');
        $('#total-review-counter').html(reviews.length + ' total reviews');
        add_review_btn.html('Edit Review');

        $('#review_modal').modal('hide');
        save_review_btn.html('Save Review');
    }

    //Save the review --> send data to server
    var url = '/courses/'.concat(course['course_code']);
    save_review_btn.on("click", function(e) {
        //online checkbox value
        is_online = $('#online-checkbox').is(':checked');

        //description value
        description = $('#description').val();
        if (description == "") description = "no comment";

        var related_professor_name = $('#professor_search_field').val();
        if (related_professor_name == "") related_professor_name = "not specified";

        //grade recivered value
        grade_recived = $('#grade-recived-selector option:selected').text();

        var data = {
            'course_rating': course_rating.getAttribute('value'),
            'difficulty_rating': difficulty_rating.getAttribute('value'),
            'grade_recived': grade_recived,
            'online': is_online,
            'description': description,
            'course_id': course.id,
            'username': user['username'],
            'related_professor_name': related_professor_name
        }
        restProtc('PUT', data, url, postReviewHandler)

    });
});