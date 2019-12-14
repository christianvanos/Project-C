$('#edit_userstoryModal').on('show.bs.modal', function (event) {
    var dev = $(event.relatedTarget) // Button that triggered the modal
    var userstory_id = dev.data('userstory-id') // Extract info from data-* attributes
    var userstory_description = dev.data('userstory-description') // Extract info from data-* attributes
    var userstory_ac = dev.data('userstory-ac') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // modal.find('.modal-title').text('New message to ' + backlog_id)
    $('#edit_userstory_input_id').val(userstory_id)
    $('#edit_description_input').val(userstory_description)
    $('#edit_ac_input').val(userstory_ac)
});

$(function () {
    $('#edituserstory button').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'post',
            url: '/userstories/edited',
            data: $('form#edituserstory').serialize(),
            success: function () {
                $('#edit_userstoryModal').modal('hide');
                location.reload();
            }
        });
    });
});