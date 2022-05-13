$(function () {

    document.querySelectorAll('.likeBtn').forEach(function (obj) {
        obj.addEventListener('click', function(){
            
            if(user['username'] === obj.querySelector('#reviewOnwer').dataset.data) return;
            click(obj);
        });
    });

    function click(likeBtn) {
        var likeIcon = likeBtn.querySelector('#likeIcon')
        var liked = likeIcon.classList.contains('material-icons');
        var likeCount = likeBtn.querySelector('#like_count');

        let user_id = user['id'];
        let review_id = parseInt(likeBtn.querySelector('#reviewId').dataset.data);

        var data = {
            'user_id': user_id,
            'review_id': review_id,
            'courseOrProfessor': courseOrProfessor
        }

        let url = '/review/like'

        //like
        if (liked) {
            url = '/review/unlike'
        }

        if (likeIcon.classList.contains('material-icons')) {
            likeIcon.classList.remove('material-icons');
            likeIcon.classList.add('material-icons-outlined');
            likeCount.innerHTML = (parseInt(likeCount.innerHTML) -1 + ' Like');
        } else {
            likeIcon.classList.add('material-icons');
            likeIcon.classList.remove('material-icons-outlined');
            likeCount.innerHTML = (parseInt(likeCount.innerHTML) + 1 + ' Like');
        }

        liked = !liked;

        restProtc("PUT", data, url, null)
    };
});