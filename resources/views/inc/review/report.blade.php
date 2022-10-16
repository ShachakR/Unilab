<div class="text-center mb-3">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="report_modal" tabindex="-1" aria-labelledby="report_modal_label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="report_modal_label">Flag Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Reason</span>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select a reason</option>
                            <option value="A+">Spam</option>
                            <option value="A">Rude or Offensive</option>
                            <option value="B+">Not Constructive / Off-Topic</option>
                            <option value="B">Private Information</option>
                          </select>
                    </div>
                    <div class="input-group needs-validation">
                        <span class="input-group-text">Additonal Comments</span>
                        <textarea maxlength="200" class="form-control" aria-label="description"></textarea>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Report</button>
                </div>
            </div>
        </div>
    </div>
</div>
