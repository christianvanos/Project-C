<div class="modal modal-black fade" id="edit_userstoryitemModal" tabindex="-1" role="dialog" aria-labelledby="edit_userstoryitemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editItemForm">
                    <div class="form-group">
                        <label for="description_input">Description</label>
                    <input type="text" class="form-control" name="description" id="edit_description_input" required>
                    </div>
                    <div class="form-group">
                        <label for="points_input">Points</label>
                    <input type="text" class="form-control" name="points" id="edit_points_input" required>
                    </div>
                    <div class="form-group">
                        <label for="moscow_select">MoSCoW Priority</label>
                        <select multiple class="form-control" id="edit_moscow_select" name="moscow" required>
                            <option>Must Have</option>
                            <option>Should Have</option>
                            <option>Could Have</option>
                            <option>Would Have</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userstory_select">Userstory</label>
                        <select multiple class="form-control" id="edit_userstory_select" name="userstory_id" required>
                            @foreach($userstories as $story)
                                <option value="{{ $story->id }}">{{ $story->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userstory_select">Member</label>
                        <select multiple="multiple" class="form-control" id="edit_member_select" name="member_id" required>
                            @foreach($project->members as $member)
                                <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="defenition_of_done_textarea">Definition of Done</label>
                        <textarea class="form-control" name="definition_of_done" id="edit_defenition_of_done_textarea" required></textarea>
                    </div>
                    <input type="hidden" id="input_item_id" name="item_id" class="form-control">
                    <input type="hidden" id="input_submit" name="submit" class="form-control">
                    <button type="submit" value="send" name="submit" class="btn btn-default">Send</button>
                    <button type="submit" value="delete" name="submit" style="float: right" class="btn btn-danger" class="btn btn-default">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/userstory_item_edit.js"></script>