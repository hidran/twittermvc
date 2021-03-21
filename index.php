<?php
session_start();

// 
if(empty($_SESSION['csrf'])){
    $bytes = random_bytes(32);
    $token = bin2hex($bytes);
    $_SESSION['csrf'] = $token;
}

require 'views/header.php';

require 'views/home.php';
require 'views/footer.php';