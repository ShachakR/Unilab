<div class="text-center mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-university-modal">
        Add University
    </button>

    <div class="modal fade" id="add-university-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add University</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>University not found? Send us a request to add it!</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text">University</span>
                        <div class="autocomplete" style="width:300px">
                            <input name="university_name" id="university_search_field_nav" type="text"
                                class="form-control" placeholder="University Name" value="" aria-label="University">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submit_university_request" type="submit" class="btn btn-primary" onclick="sendRequest(
                        'university_search_field_nav',
                        'university',
                        'inapplicable',
                        'add-university-modal'
                        )">
                        Send Request
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
