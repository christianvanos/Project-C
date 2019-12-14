$('#add_userstoryModal').on('show.bs.modal', function (event) {
    var dev = $(event.relatedTarget) // Button that triggered the modal
    var userstory_project_id = dev.data('userstory-project-id') // Extract info from data-* attributes
    $('#add_input_project_id').val(userstory_project_id)
});

$(function () {
    $('#adduserstory button').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'post',
            url: '/userstories/added',
            data: $('form#adduserstory').serialize(),
            success: function () {
                $('#add_userstoryModal').modal('hide');
                location.reload();
            }
        });
    });
});