<form id="tweetform" method="post" action="actions.php">
                <div class="formTweet">
                    <div class="form-group">
                    <input name="action" type="hidden" value="postTweet">
                    <input type="hidden" id="tweetcsrf" name="csrf" value="<?=$_SESSION['csrf']?>">
                        <textarea required id="tweetpost" name="tweetpost" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="btnTweetPost" class="btn btn-success">POST TWEET</button>
                    </div>
                </div>
            </form>