
function sendRequest(input_field, request_type, university_name, modal_id) {
    var modal = $('#' + modal_id);
    var request_val = $('#' + input_field).val();
    if (request_val == null || request_val == '') return;

    var data = {
        'type': request_type,
        'university_name': university_name,
        'request_val': capatalizeFirstLetter(request_val),
    }

    url = '/admin/createUserRequest'
    modal.modal('hide');
    restProtc("PUT", data, url, callback)
}

function callback() {
    const options = {
        corner: "bottom_right",
    };

    const notify = new Notify(options);

    notify.render({
        head: "Success",
        content: "Request Sent!",
        style: "success",
    });
}


function capatalizeFirstLetter(str) {
    str = str.toLowerCase();
    const arr = str.split(" ");
    for (var i = 0; i < arr.length; i++) {
        arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);

    }
    const str2 = arr.join(" ");
    return str2;
}