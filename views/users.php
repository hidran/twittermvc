<h1>Twitter users</h1>
<ul class="list-group">

    <?php
    foreach ($users as  $user) { ?>

        <li class="list-group-item">
            <a href="index.php?user_id=<?= $user['id'] ?>">
                <?= $user['email'] ?>
            </a>
        </li>

    <?php } ?>
</ul>