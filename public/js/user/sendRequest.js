
function sendRequest(input_field, request_type, university_name, modal_id) {
    const modal = $('#' + modal_id);
    request_type = request_type.toLowerCase();
    let request_val = $('#' + input_field).val();
    if (request_val == null || request_val == '') return;

    var makeFullCase = (request_type == 'course') ? true : false;

    var data = {
        'type': request_type,
        'university_name': university_name,
        'request_val': format(request_val, makeFullCase),
    }

    url = '/request/createUserRequest'
    modal.modal('hide');
    restProtc("PUT", data, url, callback)
}

function callback(response) {
    const options = {
        corner: "top_right",
        delay: 3000
    };

    const notify = new Notify(options);

    if(response['sent'] == false){
        notify.render({
            head: "Request Failed",
            content: "Already exists",
            style: "danger",
        });
        return;
    }

    notify.render({
        head: "Success",
        content: "Request Sent!",
        style: "success",
    });
}


function format(str, makeFullCase) {

    if(makeFullCase){
        str = str.toUpperCase();
    }else{
        str = str.toLowerCase();
    }

    const arr = str.split(" ");
    for (var i = 0; i < arr.length; i++) {
        arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);

    }
    const str2 = arr.join(" ");
    return str2;
}