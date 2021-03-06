<?php
session_start();
require 'functions.php';
require 'models/tweet.php';
// 
if (empty($_SESSION['csrf'])) {
    $bytes = random_bytes(32);
    $token = bin2hex($bytes);
    $_SESSION['csrf'] = $token;
}

require 'views/header.php';
$user_id = $_REQUEST['user_id'] ?? 0;
$search = $_REQUEST['filter'] ?? '';
$myTweets = $_REQUEST['showMyTweets'] ?? '';
$tweets = findAllTweets($user_id, $search, $myTweets);
require 'views/home.php';
require 'views/footer.php';
