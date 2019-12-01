<div class="modal modal-black fade" id="add_userstoryitemModal" tabindex="-1" role="dialog" aria-labelledby="add_userstoryitemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addItemForm">
                    <div class="form-group">
                        <label for="description_input">Description</label>
                        <input type="text" class="form-control" name="description" id="description_input" required>
                    </div>
                    <div class="form-group">
                        <label for="points_input">Points</label>
                        <input type="text" class="form-control" name="points" id="points_input" required>
                    </div>
                    <div class="form-group">
                        <label for="moscow_select">MoSCoW Priority</label>
                        <select multiple class="form-control" id="moscow_select" name="moscow" required>
                            <option>Must Have</option>
                            <option>Could Have</option>
                            <option>Should Have</option>
                            <option>Would Have</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userstory_select">Userstory</label>
                        <select multiple class="form-control" id="userstory_select" name="userstory_id" required>
                            @foreach($userstories as $story)
                                <option value="{{ $story->id }}">{{ $story->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userstory_select">Member</label>
                        <select multiple="multiple" class="form-control" id="member_select" name="member_id" required>
                            @foreach($project->members as $member)
                                <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="defenition_of_done_textarea">Definition of Done</label>
                        <textarea class="form-control" name="definition_of_done" id="defenition_of_done_textarea" required></textarea>
                    </div>
                    <input type="hidden" id="input_backlog_id" name="backlog_id" class="form-control">
                    <button type="submit" class="btn btn-default">Send</button>
                    <button type="button" style="float: right" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/scrumboard') }}/userstory_item_add.js"></script>