<?php
$res = findAllTweets(getUserId());
if ($res['data']) :
    foreach ($res['data'] as $value):
        $buttonLabel = $value['following'] ? 'Unfollow' : 'Follow';
        $btnClass = $value['following'] ? 'success' : 'primary';
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $value['email'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $value['datetime'] ?></h6>
                <p class="card-text"><?= htmlentities(strip_tags($value['tweet'])) ?></p>
                <?php if (isUserLoggedIn() && $value['user_id'] != getUserId()) : ?>
                    <a href="#" data-user="<?= $value['user_id']?>" data-following="<?= $value['following']?>" class="btn btn-<?= $btnClass ?>"><?= $buttonLabel ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endforeach;
else:
    echo "<p>No tweets found $res[msg] </p>";

endif;

?>
