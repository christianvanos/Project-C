<div class="modal modal-black fade" id="edit_userstoryModal" tabindex="-1" role="dialog" aria-labelledby="edit_userstoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Userstory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edituserstory">
                    <div class="form-group">
                        <label for="description_input">Description</label>
                        <input type="text" class="form-control" name="userstory_description" id="edit_description_input" required>
                    </div>
                    <div class="form-group">
                        <label for="ac_input">Acceptence Criterea</label>
                        <input type="text" class="form-control" id="edit_ac_input" name="userstory_ac" required>
                    </div>
                    <input type="hidden" id="edit_userstory_input_id" name="userstory_id" class="form-control">
                    <button type="submit" value="update" name="submit" class="btn btn-default">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/userstory_edit.js"></script>