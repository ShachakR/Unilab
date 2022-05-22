function validateEmail(value) {

    const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (validRegex.test(value)) {
        return true;
    }

    return false;

}

function validatePasswordComplexity(value) {
    const validRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    // /^
    //     (?=.*\d)          // should contain at least one digit
    //     (?=.* [a - z])       // should contain at least one lower case
    //     (?=.* [A - Z])       // should contain at least one upper case
    // [a - zA - Z0 - 9]{ 8,}   // should contain at least 8 from the mentioned characters
    // $ /

    if (validRegex.test(value)) {
        return true;
    }

    return false;
    
}