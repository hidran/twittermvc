<main class="container">
    <h1>TWITTER APP</h1>
    <div class="row">
        <div class="col-md-8" id="tweets">
            <?php require 'views/tweets.php'?>
        </div>
        <div class="col-md-4">
            <form action="actions.php" class="form-inline" id="filterTweets">
            <input name="action" type="hidden" value="filterTweets">
                <input name="filter" id="filterField" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button id="filterTweetsBtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php
            if(isUserLoggedIn()){
                require 'views/tweet-form.php';
            }
            
             ?>
        </div>
    </div>

    </div>
</main>