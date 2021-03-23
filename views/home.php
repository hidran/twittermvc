<main class="container">
    <h1>TWITTER APP</h1>
    <div class="row">
        <div class="col-md-8">
            <?php
            $res = findAllTweets(getUserId());
            if ($res['data']) :
                foreach ($res['data'] as $value):
                    $buttonLabel = $value['following']?'Unfollow':'Follow';
                     $btnClass = $value['following']?'success':'primary';
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['email'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $value['datetime'] ?></h6>
                            <p class="card-text"><?= htmlentities(strip_tags($value['tweet'])) ?></p>
                            <?php if (isUserLoggedIn() && $value['user_id'] != getUserId()) : ?>
                                <a href=#" class="btn btn-<?=$btnClass?>"><?=$buttonLabel?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                endforeach;
            else:
                echo "<p>No tweets found $res[msg] </p>";

            endif;

            ?>
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