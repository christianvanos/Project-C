$( function() {
    var url = '/scrumboard/backlogmoved';
    $('div#sort_backlog').sortable({
        connectWith: ".taskboard",
        update: function (e, ui) {
            var backlog_id = $(ui.item).data("backlog-id");
            var sprint_id = $('meta[name="sprint-id"]').attr('content');
            var index = $(ui.item).index();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post(url, {
                backlog_id: backlog_id,
                sprint_id: sprint_id,
                index: index
            });
        }
    
    }).disableSelection();
} );