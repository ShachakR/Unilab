$(function () {
  var selectUni = $('#select-university-modal');
  var selectBtn = $('#select-university-btn');
  var selectModalBtn = $('#select-modal-btn');

  var universities = []; 
  var university_names = [];

  function getUniversities(data){
    universities = JSON.parse(data['data']); 

    for (var i = 0; i < universities.length; i++){
      university_names[i] = universities[i]['name'];
    }

    autocomplete(document.getElementById('university_search_field-nav'), universities, 'name');
  }

  function setSelectedUniversity(data){
    var selectedName = JSON.parse(data['selected']);
    if(!selectedName){
      document.getElementById('university_search_field-nav').value = 'Select University';
      return; 
    }
    selectedName = selectedName['name'];
    selectModalBtn.html(selectedName); 
    document.getElementById('university_search_field-nav').value = selectedName;
  }

  var url = '/GlobalResource/GetSelectedUniversity'; 
  restProtc("GET", null, url, setSelectedUniversity);

  url = '/GlobalResource/GetUniversities'; 
  restProtc("GET", null, url, getUniversities);

  selectBtn.on('click', function () {
    var selectedUniName = document.getElementById('university_search_field-nav').value;
    if (!selectedUniName || !university_names.includes(selectedUniName)) return;

    selectModalBtn.html(selectedUniName);
    selectUni.modal('hide');

    var data = {
      'university_name': selectedUniName,
    }
    var url = '/GlobalResource/SelectedUniversity/'.concat(selectedUniName); 
    restProtc("PUT", data, url, null);
    location.reload();
  });

});