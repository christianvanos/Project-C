$( function() {
    var url = '/scrumboard/itemmoved';
    $('ul#sort_item').sortable({
        connectWith: ".backlog",
        receive: function (e, ui) {
            var backlog_id = $(ui.item).parent().parent().data("backlog-id");
            var item_id = $(ui.item).data("item-id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post(url, {
                backlog_id: backlog_id,
                user_story_id: item_id
            });
            }
    
    }).disableSelection();
} );