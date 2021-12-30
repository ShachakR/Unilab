<div class="text-center mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#course_request_modal">
        Add Professor
    </button>

    <!-- Modal -->
    <div class="modal fade" id="course_request_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Professor Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Full Name</span>
                        <input name="name" id="name" type="text" class="form-control"
                            placeholder="Ex: Albert Einstein" aria-label="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submit_request" type="submit" class="btn btn-primary">Submit Request</button>
                </div>
            </div>
        </div>
    </div>
</div>
