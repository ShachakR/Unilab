$(function() {
    $('#searchbox-input').on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".course-card").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    //handle bookmarks
    $('.bookmark-icon').on('click', function() {
        var iconElement = $(this).children('#icon');

        if (iconElement.hasClass('material-icons-outlined')) {

            iconElement.removeClass('material-icons-outlined')
            iconElement.addClass('material-icons')

            iconElement.html('bookmark_remove');
            //call to add bookmark on the backend 
        } else {
            iconElement.removeClass('material-icons')
            iconElement.addClass('material-icons-outlined')

            iconElement.html('bookmark_add');
            //call to remove bookmark on the backend 
        }

    })
});