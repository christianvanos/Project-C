$('#add_userstoryitemModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var backlog_id = button.data('backlog-id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // modal.find('.modal-title').text('New message to ' + backlog_id)
    $('#input_backlog_id').val(backlog_id)
});

$(function () {
    $('#addItemForm').on('submit', function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/scrumboard/itemadded',
            data: $('form#addItemForm').serialize(),
            success: function () {
                $('#add_userstoryitemModal').modal('hide');
                location.reload();
            }
        });
    });
});