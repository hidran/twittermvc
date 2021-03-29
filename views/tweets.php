<?php
$res = findAllTweets();
if ($res['data']) :
    foreach ($res['data'] as $value):
      
            echo getTweetTpl($value);
       
    endforeach;
else:
    echo "<p>No tweets found $res[msg] </p>";

endif;

?>
