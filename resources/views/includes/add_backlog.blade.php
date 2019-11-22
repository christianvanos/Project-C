<div class="modal modal-black fade" id="add_backlogModal" tabindex="-1" role="dialog" aria-labelledby="add_backlogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Add Backlog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addbacklog">
                    <div class="form-group">
                        <label for="name_input">Name</label>
                        <input type="text" class="form-control" name="name" id="name_input" required>
                    </div>
                    <div class="form-group">
                        <label for="label_select">Label</label>
                        <select multiple class="form-control" id="label_select" name="label" required>
                            <option>todo</option>
                            <option>doing</option>
                            <option>done</option>
                        </select>
                    </div>
                    <input type="hidden" id="input_sprint_id" name="sprint_id" class="form-control">
                    <button type="submit" class="btn btn-default">Send</button>
                    <button type="button" style="float: right" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/backlog_add.js"></script>