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