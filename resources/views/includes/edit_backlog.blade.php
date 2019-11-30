<div class="modal modal-black fade" id="edit_backlogModal" tabindex="-1" role="dialog" aria-labelledby="edit_backlogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Backlog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editbacklog">
                    <div class="form-group">
                        <label for="name_input">Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name_input" required>
                    </div>
                    <div class="form-group">
                        <label for="label_select">Label</label>
                        <select multiple class="form-control" id="edit_label_select" name="label" required>
                            <option>todo</option>
                            <option>doing</option>
                            <option>done</option>
                        </select>
                    </div>
                    <input type="hidden" id="edit_input_backlog_id" name="backlog_id" class="form-control">
                    <input type="hidden" id="backlog_input_submit" name="submit" class="form-control">
                    <button type="submit" value="update" name="submit" class="btn btn-default">Update</button>
                    <button type="submit" value="delete" name="submit" style="float: right" class="btn btn-danger" class="btn btn-default">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/backlog_edit.js"></script>