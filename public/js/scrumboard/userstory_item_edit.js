$('#edit_userstoryitemModal').on('show.bs.modal', function (event) {
    var li = $(event.relatedTarget) // Button that triggered the modal
    var item_id = li.data('item-id') // Extract info from data-* attributes
    var item_description = li.data('item-description') // Extract info from data-* attributes
    var item_story_points = li.data('item-story-points') // Extract info from data-* attributes
    var item_moscow = li.data('item-moscow') // Extract info from data-* attributes
    var item_userstory_id = li.data('item-userstory-id') // Extract info from data-* attributes
    var item_member_id = li.data('item-member-id') // Extract info from data-* attributes
    var item_definition_of_done = li.data('item-definition-of-done') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // modal.find('.modal-title').text('New message to ' + backlog_id)
    $('#input_item_id').val(item_id)
    $('#edit_description_input').val(item_description)
    $('#edit_points_input').val(item_story_points)
    $('#edit_moscow_select').val(item_moscow)
    $('#edit_userstory_select').val(item_userstory_id)
    $('#edit_member_select').val(item_member_id)
    $('#edit_defenition_of_done_textarea').val(item_definition_of_done)
});

$(function () {
    $('#editItemForm button').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if ($(this).attr("value") == "delete") {
            $('#input_submit').val("delete")
        } 
        if ($(this).attr("value") == "send") {
            $('#input_submit').val("send")
        }

        $.ajax({
            type: 'post',
            url: '/scrumboard/itemedited',
            data: $('form#editItemForm').serialize(),
            success: function () {
                $('#edit_userstoryitemModal').modal('hide');
                location.reload();
            }
        });
    });
});