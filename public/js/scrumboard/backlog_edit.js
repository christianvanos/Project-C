$('#edit_backlogModal').on('show.bs.modal', function (event) {
    var dev = $(event.relatedTarget) // Button that triggered the modal
    var backlog_id = dev.data('backlog-id') // Extract info from data-* attributes
    var backlog_name = dev.data('backlog-name') // Extract info from data-* attributes
    var backlog_label = dev.data('backlog-label') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // modal.find('.modal-title').text('New message to ' + backlog_id)
    $('#edit_input_backlog_id').val(backlog_id)
    $('#edit_name_input').val(backlog_name)
    $('#edit_label_select').val(backlog_label)
});

$(function () {
    $('#editbacklog button').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#backlog_input_submit').val("qwertyuiop")
        if ($(this).attr("value") == "delete") {
            $('#backlog_input_submit').val("delete")
        } 
        if ($(this).attr("value") == "update") {
            $('#backlog_input_submit').val("update")
        }

        $.ajax({
            type: 'post',
            url: '/scrumboard/backlogedited',
            data: $('form#editbacklog').serialize(),
            success: function () {
                $('#edit_backlogModal').modal('hide');
                location.reload();
            }
        });
    });
});