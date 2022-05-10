$(function() {

    var university_search_field = document.getElementById('university_search_field');
    autocomplete(university_search_field, universities);

    var saveBtn = document.getElementById("save_changes");

    var  university_names_arr = [];
    for (var i = 0; i < universities.length; i++){
        university_names_arr[i] = universities[i]['name'];
      }

    saveBtn.addEventListener("click", function(e) {
        var university_name = university_search_field.value;

        if (university_names_arr.includes(university_name) || university_name == '') {
            var url = '/'.concat(user.username);
            var description = document.getElementById('description_field').value;

            var data = {
                'user_id': user.id,
                'university_name': university_name,
                'description': description
            }

            function callback(response){
                $('#edit_profile_modal').modal('hide');
                document.getElementById('university_label').innerHTML = response['new_university_name'];
                document.getElementById('description_space').innerHTML = response['new_description'];
            }

            restProtc("PUT", data, url, callback);

        } else {
            console.log('fail');
            //do some UI notification
        }
    });

});