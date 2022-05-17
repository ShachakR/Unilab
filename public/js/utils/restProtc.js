/**
 * 
 * @param {string} protc REST protocol string value('PUT', 'POST', 'GET', 'DELETE')
 * @param {object} data object containing data
 * @param {string} url path url
 * @param {function} callback function that can take in a json ovbject reponse as an agrument
 * @returns void
 */
function restProtc(protc, data, url, callback) {
    if( (protc != "PUT" && protc != "POST" && protc != "GET" && protc != "DELETE") ) return; 
    data = data == null ? "" : JSON.stringify(data);
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: protc,
        url: url,
        data: data,
        contentType: "application/json",
        dataType: "json",
        success: function(response) {
            if(callback){
                callback(response);
            }
        }
    });
}