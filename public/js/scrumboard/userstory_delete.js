$(function () {
    $('#delete_userstory').click(function(e) {
        var dev = $(this) // Button that triggered the modal
        var userstory_id = dev.data('userstory-id') // Extract info from data-* attributes
    
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'post',
            url: '/userstories/deleted',
            data: {
                'userstory_id': userstory_id
            },
            success: function () {
                location.reload();
            }
        });
    });
});