<?php

if ($tweets['data']) :
    foreach ($tweets['data'] as $value) :

        echo getTweetTpl($value);

    endforeach;
else :
    echo "<p>No tweets found $res[msg] </p>";

endif;
