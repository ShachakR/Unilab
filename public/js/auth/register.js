$(function () {
    let alert = $('#failed_register_alert');
    let emailInp = $('#register_email');
    let usernameInp = $('#register_username');
    let passwordInp = $('#register_password'); 
    let passwordConfirmInp = $('#password-confirm'); 

    $('#register_btn').on('click', function(){
        let email = emailInp.val();
        let password = passwordInp.val(); 
        let username = usernameInp.val();
        let passwordConfirm = passwordConfirmInp.val();

        data = {
            'username': username,
            'email': email,
            'password': password,
            'password_confirmation': passwordConfirm
        }

        console.log(data);

        if(!username || username === ""){
            invalidInputAlert(usernameInp, 'username');
            return;
        }

        if(!validatePasswordComplexity(password)){
            invalidInputAlert(passwordInp, 'register-password');
            return;
        }

        if(password !== passwordConfirm){
            invalidInputAlert(passwordConfirmInp, 'password-confirm');
            return;
        }

        if(validateEmail(email)){
            restProtc("PUT", data, '/auth/register', registerCallback);
        }else{
            invalidInputAlert(emailInp, 'register-email');
        }
        
    });

    function registerCallback(response){
        if(response['logged_in']){
            alert.addClass('hide');
            window.location.reload();
            return;
        }

        alert.removeClass('hide');
    }

    emailInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(emailInp, 'register-email');
    });

    usernameInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(usernameInp, 'username');
    });

    passwordInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(passwordInp, 'register-password');
        removeInvalidInputAlert(passwordConfirmInp, 'password-confirm');
    });


    passwordConfirmInp.on('input', function() {
        alert.addClass('hide');
        removeInvalidInputAlert(passwordInp, 'register-password');
        removeInvalidInputAlert(passwordConfirmInp, 'password-confirm');
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