<main class="container">
    <h1>TWITTER APP</h1>
    <div class="row">
        <div class="col-md-8" id="tweets">
            <?php require 'views/tweets.php'?>
        </div>
        <div class="col-md-4">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <form>
                <div class="formTweet">
                    <div class="form-group">

                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">POST TWEET</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
</main>