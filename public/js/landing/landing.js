$(function() {
    
    $('.main-card').on('click', function(){
        const university_name = $(this).children('.card-body').children('.card-title').html();
        
        const data = {
            'university_name': university_name
        };

        const URL = '/select_university';

        restProtc("PUT", data, URL, function(){
            window.location = '/home';
        });

    });

});