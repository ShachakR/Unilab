$(function () {
    window.addEventListener('popstate', function(e){
       this.window.location.href = location.href;
    })

    
    $('#profile').on("click", function (e) {
        var href = $(this).attr('href');
        if (href != undefined) {
            e.preventDefault();
            $("#content").load($(this).attr('href') + ' #content');
            history.pushState('', '', href)
            history.replaceState('', '', href);
            setActive('profile');
        }
    })

    $('#home').on("click", function (e) {
        var href = $(this).attr('href');
        if (href != undefined) {
            e.preventDefault();
            $("#content").load($(this).attr('href') + ' #content');
            history.pushState('', '', href)
            history.replaceState('', '', href);
            setActive('home');
        }
    })

    $('#courses').on("click", function (e) {
        var href = $(this).attr('href');
        if (href != undefined) {
            e.preventDefault();
            $("#content").load($(this).attr('href') + ' #content');
            history.pushState('', '', href)
            history.replaceState('', '', href);
            setActive('courses');
        }
    })

    $('#professors').on("click", function (e) {
        var href = $(this).attr('href');
        if (href != undefined) {
            e.preventDefault();
            $("#content").load($(this).attr('href') + ' #content');
            history.pushState('', '', href)
            history.replaceState('', '', href);
            setActive('professors');
        }
    })

    $('#bookmarks').on("click", function (e) {
        var href = $(this).attr('href');
        if (href != undefined) {
            e.preventDefault();
            $("#content").load($(this).attr('href') + ' #content');
            history.pushState('', '', href)
            history.replaceState('', '', href);
            setActive('bookmarks');
        }
    })

    function setActive(id){
        $('.nav-item').each(function(i, obj) {
            if(obj.id === id){
                $('#' + obj.id + '-0').removeClass('material-icons-outlined');
                $('#' + obj.id + '-0').addClass('material-icons');
                $('#' + obj.id + '-1').addClass('fw-bold');
            }else{
                $('#' + obj.id + '-0').addClass('material-icons-outlined');
                $('#' + obj.id + '-0').removeClass('material-icons');
                $('#' + obj.id + '-1').removeClass('fw-bold');
            }
        });
    }
    


});