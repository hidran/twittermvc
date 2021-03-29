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

// post a tweet
$('#tweetform #btnTweetPost').click(function (evt) {
    evt.preventDefault();

    const tweetPost = $('#tweetpost').val();
    if(!tweetPost || tweetPost.length <4){
        alert('Tweet min length is 3!');
        return false;
    }
    const data = $('#tweetform').serialize();

    $.ajax({
        method: 'POST',
        url: 'actions.php',
        data:data,
        success: function (data) {
          const tweetData = JSON.parse(data);
           if(!tweetData['success']){
               alert(tweetData['msg']);
               return;
           }
           const tweets = document.getElementById('tweets');
           const firstChild = tweets.firstChild;
            const myDiv = document.createElement('div');
            myDiv.innerHTML = tweetData['tweet'];
            tweets.insertBefore(myDiv, firstChild);
        }
    })
});



// filter  tweets
$('#filterTweets #filterTweetsBtn').click(function (evt) {
    evt.preventDefault();

    const filterField = $('#filterField').val();
    if(!filterField || filterField.length <4){
        alert('The search text min length is 3!');
        return false;
    }
    const data = $('#filterTweets').serialize();

    $.ajax({
        method: 'GET',
        url: 'actions.php',
        data:data,
        success: function (data) {
          const tweetData = JSON.parse(data);
           if(!tweetData['success']){
               alert(tweetData['msg']);
               return;
           }
           const tweets = document.getElementById('tweets');
          
            tweets.innerHTML = tweetData['tweets'];
          
        }
    })
});