<div class="text-center mb-3">
    <!-- Button trigger modal -->
    <button id="review_modal_btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#course_review_modal">Add Review</button>

    <!-- Modal -->
    <div class="modal fade" id="course_review_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$course->course_code}} Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Course Rating: <span class="ml-1 fw-bold" style="color: #0d6efd" id="course-rating-display"></span> </span>
                        <input type="range" class="form-range" min="1" max="5" step="1" id="course-rating-range">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Difficulty Rating: <span class="ml-1 fw-bold" style="color: #0d6efd" id="difficulty-rating-display"></span> </span>
                        <input type="range" class="form-range" min="1" max="5" step="1" id="difficulty-rating-range">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Grade Recived:</span>
                        <select id="grade-recived-selector" class="form-select" aria-label="Default select example">
                            <option selected>None</option>
                            <option value="A+">A+</option>
                            <option value="A">A</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                            <option value="C+">C+</option>
                            <option value="C">C</option>
                            <option value="D+">D+</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                          </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Online</span>
                        <div class="input-group-text">
                            <input id="online-checkbox" class="form-check-input mt-0" type="checkbox" value="" aria-label="Was it online?">
                          </div>
                    </div>
                    <div class="input-group needs-validation">
                        <span class="input-group-text">Description</span>
                        <textarea id="description" maxlength="300" class="form-control" aria-label="description"></textarea>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save_review" type="submit" class="btn btn-primary"> Add Review</button>
                </div>
            </div>
        </div>
    </div>
</div>
