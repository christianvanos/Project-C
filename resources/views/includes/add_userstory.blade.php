<div class="modal modal-black fade" id="add_userstoryModal" tabindex="-1" role="dialog" aria-labelledby="add_userstoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Add Userstory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="adduserstory">
                    <div class="form-group">
                        <label for="add_description_input">Description</label>
                        <input type="text" class="form-control" name="add_userstory_description" id="add_description_input" required>
                    </div>
                    <div class="form-group">
                        <label for="add_ac_input">Acceptence Criterea</label>
                        <input type="text" class="form-control" id="add_ac_input" name="add_userstory_ac" required>
                    </div>
                    <input type="hidden" id="add_input_project_id" name="add_project_id" class="form-control">
                    <button type="submit" value="update" name="submit" class="btn btn-default">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/userstory_add.js"></script>