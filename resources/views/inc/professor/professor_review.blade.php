<div class="text-center mb-3">
    <!-- Button trigger modal -->
    <button id="add_review" type="button" class="btn btn-primary mt-3">Add Review</button>

    <!-- Modal -->
    <div class="modal fade" id="review_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $professor->name }} Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3 align-items-end">
                        <span class="input-group-text">Professor Rating:</span>
                        <div value="1" id="professor-rating" class="ms-2">
                            @include('inc.review.star_rating')
                        </div>
                    </div>
                    <div class="input-group mb-3 align-items-end">
                        <span class="input-group-text">Difficulty Rating:</span>
                        <div value="1" id="difficulty-rating" class="ms-2">
                            @include('inc.review.star_rating')
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Would take again?</span>
                        <div class="input-group-text">
                            <input id="take_again-checkbox" class="form-check-input mt-0" type="checkbox" value=""
                                aria-label="Would take again?">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Course</span>
                        <div class="autocomplete" style="width:300px">
                            <input name="course_name" id="course_search_field" type="text" class="form-control"
                            placeholder="Course" value="" aria-label="University">
                        </div>
                    </div>
                    <div class="input-group needs-validation">
                        <span class="input-group-text">Description</span>
                        <textarea id="description" maxlength="200" class="form-control" aria-label="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save_review" type="submit" class="btn btn-primary">Add Review</button>
                </div>
            </div>
        </div>
    </div>
</div>
