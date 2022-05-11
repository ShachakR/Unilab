//NOT IN USE CURRENTLY
$(function () {
    window.addEventListener('popstate', function(e){
       this.window.location.href = location.href;
    })
    console.log(courses);
    
    $.each(courses, function(index, jsonObject){
        $.each(jsonObject, function(key,val){
            if(key == 'course_code'){
                $('#' + val).on("click", function (e) {
                    console.log('hi');
                    var href = $(this).attr('href');
                    if (href != undefined) {
                        e.preventDefault();
                        $("#content").load($(this).attr('href') + ' #content');
                        history.pushState('', '', href)
                        history.replaceState('', '', href);
                    }
                })
            }
        });
    });

});