$('#tweets .btn').click(function (evt) {
    evt.preventDefault();
    const ele = $(this);
    const userId = ele.attr('data-user');
    let following = ele.attr('data-following');
    const btnClass = following ? 'btn-success' : 'btn-primary';
    $.ajax({
        method: 'POST',
        url: 'actions.php',
        data: {
            userId,
            following,
            action: 'toggleFollow',
            csrf: $('#csrf').val()
        },
        success: function (data) {
            const ele = $(evt.target)
            const result = JSON.parse(data);
           if(result.success) {
                following = result.following;
               alert(result.following)
               if (result.following) {

                   ele.attr('data-following', 1);
                   ele.addClass('btn-success');
                   ele.removeClass('btn-primary');
                   ele.html('UnFollow')
               } else {
                   ele.attr('data-following', 0);
                   ele.removeClass('btn-success');
                   ele.addClass('btn-primary');
                   ele.html('Follow')
               }
           }

        }
    })
});

