<script src="{{ URL::asset('/js/user/sendRequest.js') }}"></script>
<div class="modal fade" id="select-university-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select University</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">University</span>
                    <div class="autocomplete" style="width:300px">
                        <input name="university_name" id="university_search_field_nav" type="text"
                            class="form-control" placeholder="University Name" value="" aria-label="University">
                    </div>
                </div>
                <p>University not found? Send us a request to add it!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="select-university-btn" type="submit" class="btn btn-primary">Select</button>
                <button id="submit_university_request" type="submit" class="btn btn-primary" onclick="sendRequest(
                    'university_search_field_nav',
                    'university',
                    'inapplicable',
                    'select-university-modal'
                    )">
                    Send Add Request
                </button>
            </div>
        </div>
    </div>
</div>
