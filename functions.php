<?php
function isValidToken($token){
    return $token === $_SESSION['csrf'];
}

$strTimeAgo = '';
if (!empty($_POST['date-field'])) {
    $strTimeAgo = timeago($_POST['date-field']);
}
function timeago($date = '')
{
    $timestamp = strtotime($date);

    $strTime = ['second', 'minute', 'hour', 'day', 'month', 'year'];
    $length = ['60', '60', '24', '30', '12', '10'];
    $diff = 0;
    $currentTime = time();

        $diff = time() - $timestamp;
        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);


    return $diff . ' ' . $strTime[$i] . '(s) ago ';
}

function isUserLoggedIn():int {
    return  $_SESSION['userloggedin']  ?? 0;
}
function getUserEmail():string {
    return  $_SESSION['email']  ?? '';
}
function getUserId():string {
    return  $_SESSION['id']  ?? 0;
}