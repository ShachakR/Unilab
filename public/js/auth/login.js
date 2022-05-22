$(function () {
    let alert = $('#failed_login_alert');
    let emailInp = $('#login_email');
    let passwordInp = $('#login_password'); 
    
    $('#login_btn').on('click', function(){
        let email = emailInp.val();
        let password = passwordInp.val(); 
        let remember = $('#remember').val(); 

        data = {
            'email': email,
            'password': password,
            'remember': remember
        }

        if(password === ''){
            invalidInputAlert(passwordInp, 'password');
        }

        if(validateEmail(email)){
            restProtc("POST", data, '/auth/login', loginCallback);
        }else{
            invalidInputAlert(emailInp, 'email');
        }
        
    });

    function loginCallback(response){
        console.log(response);

        if(response['logged_in']){
            alert.addClass('hide');
            window.location.reload();
            return;
        }

        alert.removeClass('hide');
    }

    emailInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(emailInp, 'email');
    });

    passwordInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(passwordInp, 'password');
    });

    function invalidInputAlert(element, type){
        element.addClass('invalid-input');
        $('#invalid-' + type).removeClass('hide'); 
    }

    function removeInvalidInputAlert(element, type){
        element.removeClass('invalid-input');
        $('#invalid-' + type).addClass('hide'); 
    }
}); 