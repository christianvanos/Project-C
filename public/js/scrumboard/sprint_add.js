$('#add_sprintModal').on('show.bs.modal', function (event) {
    var dev = $(event.relatedTarget) // Button that triggered the modal
    var userstory_project_id = dev.data('userstory-project-id') // Extract info from data-* attributes
    $('#add_input_project_id').val(userstory_project_id)
});

$(function () {
    $( "#starting_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $('#addsprint button').click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'post',
            url: '/sprint/new',
            data: $('form#addsprint').serialize(),
            success: function (d) {
                $('#add_sprintModal').modal('hide');
                if (d == 'date before') {
                    $('.date-before').show().delay(3000).fadeOut();
                } else if (d == 'date in database'){
                    $('.date-in-database').show().delay(3000).fadeOut();
                } else {
                    $('.new-sprint-inserted').show().delay(2000).fadeOut();
                    location.reload();
                }
            }
        });
    });
});