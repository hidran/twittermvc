<?php
function dbConnect(){
    $dsn = 'mysql:dbname=twitter;host=127.0.0.1';
    $user = 'root';
    $password = 'hidran';
    
    $dbh = new PDO($dsn, $user, $password);

    return $dbh;
}

