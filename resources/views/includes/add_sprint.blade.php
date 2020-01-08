<div class="modal modal-black fade" id="add_sprintModal" tabindex="-1" role="dialog" aria-labelledby="add_sprintModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Add Sprint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addsprint">
                    <div class="form-group">
                        <label for="add_description_input">Starting date</label>
                        <input type="text" class="form-control" name="add_sprint_starting_date" id="starting_date" required>
                    </div>
                    <div class="form-group">
                        <label for="add_description_input">End date</label>
                        <input type="text" class="form-control" name="add_sprint_end_date" id="end_date" required>
                    </div>
                    <input type="hidden" id="add_input_project_id" name="add_project_id" class="form-control">
                    <button type="submit" value="update" name="submit" class="btn btn-default">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/sprint_add.js"></script>