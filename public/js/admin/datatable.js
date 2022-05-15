function injectData(dataTable, data, columns){
    $.each(data, function (k, v) {
        
        var insertData = [];

        $.each(columns, function (index, name) {
            if(name === 'created_at'){
                var date = new Date(data[k][name]);
                var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date)
                var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(date)
                var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date)

                insertData[index] = `${mo} ${da} ${ye}`;
            }else{
                //the data is the json object, gets the data at index 'k', with attribute 'name'
                insertData[index] = data[k][name];
            }
        });
        dataTable.row.add(insertData).draw(false);
    });

}

function getUsersDataTable(){
    var dataTable = $('#dataTable').DataTable({
        columnDefs: [
            {
                targets: 2,
                data: null,
                defaultContent: '<input class="is_admin_checkbox" type="checkbox">',
            },
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('.is_admin_checkbox', row).prop( 'checked', data[2] === 1 );

            $('.is_admin_checkbox', row).on( 'click', function () {
                var rqeuest = {
                    'id': data[0],
                    'is_admin': !data[2],
                }
    
                data[2] === 1 ? data[2] = 0 : data[2] = 1;

                var url = "/admin/setAdmin"
        
                restProtc("PUT", rqeuest, url, null); 
            } );
        }
    });

    return dataTable;
}

function getRequestsDataTable(){
    var dataTable = $('#dataTable').DataTable({
        columnDefs: [
            {
                targets: 5,
                data: null,
                defaultContent: '<button class="accept_btn">Accept</button>',
            },
            {
                targets: 6,
                data: null,
                defaultContent: '<button class="reject_btn">Reject</button>',
            },
        ],
        rowCallback: function ( row, data ) {
            $('.accept_btn', row).on( 'click', function () {
                var rqeuest = {
                    'accept': true,
                    'request_id': data[0],
                    'type': data[1],
                    'request_val': data[2],
                    'university_name': data[3],
                }

                row.remove();

                var url = "/request/handleUserRequest"
        
                restProtc("PUT", rqeuest, url, null); 
            } );
            $('.reject_btn', row).on( 'click', function () {
                var rqeuest = {
                    'accept': false,
                    'request_id': data[0],
                    'type': data[1],
                    'request_val': data[2],
                    'university_name': data[3],
                }

                row.remove();

                var url = "/request/handleUserRequest"
        
                restProtc("PUT", rqeuest, url, null); 
            } );
        }
    });

    return dataTable;
}