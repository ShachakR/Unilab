$(function() {

    var university_search_field = document.getElementById('university_search_field');
    university_names_arr = [];

    for (var i = 0; i < university_names.length; i++)
        university_names_arr[i] = university_names[i].name.toString();

    autocomplete(university_search_field, university_names_arr);

    var saveBtn = document.getElementById("save_changes");

    saveBtn.addEventListener("click", function(e) {
        var university_name = university_search_field.value;

        if (university_names_arr.includes(university_name)) {
            $('#edit_profile_modal').modal('hide');

            var url = '/'.concat(user.username);
            var description = document.getElementById('description_field').value;

            var data = {
                'user_id': user.id,
                'university_name': university_name,
                'description': description
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "PUT",
                url: url,
                data: JSON.stringify(data),
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    document.getElementById('university_label').innerHTML = response['new_university_name'];
                    if (response['new_description']) {
                        document.getElementById('description_space').innerHTML = response['new_description'];
                    }
                }
            });
        } else {
            console.log('fail');
            //do some UI notification
        }
    });

});