<div class="text-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_profile_modal">
        Edit Profile
    </button>

    <!-- Modal -->
        <div class="modal fade" id="edit_profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">University</span>
                            <div class="autocomplete" style="width:300px">
                                <input name="university_name" id="university_search_field" type="text" class="form-control"
                                placeholder="Search University" value="{{ $profile->university_name != null ? $profile->university_name : '' }}" aria-label="University">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input name="description" id="description_field" type="text" class="form-control"
                            placeholder="Introduce yourself!" aria-label="description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="save_changes" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    //Declate data for JS files 
    var university_names = @json($universities);
    var user = @json($user)
</script>

<script src="{{ URL::asset('/js/user/profile_edit.js') }}"></script>
