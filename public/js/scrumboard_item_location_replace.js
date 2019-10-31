$( function() {
    var url = '/scrumboard/itemmoved';
    $('ul[id^="sort"]').sortable({
        connectWith: ".sortable",
        receive: function (e, ui) {
            var status_id = $(ui.item).parent(".sortable").data("status-id");
            var task_id = $(ui.item).data("task-id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post(url, {
                backlog_id: status_id,
                user_story_id: task_id
            });
            }
    
    }).disableSelection();
    } );