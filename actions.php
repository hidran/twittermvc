<?php
session_start();
require 'functions.php';
require 'db/connection.php';
require 'models/tweet.php';
require 'controllers/LoginSignupController.php';
require  'controllers/TweetsController.php';
 $action = $_REQUEST['action'] ?? '';

 if(function_exists($action)){
    echo json_encode($action());
     exit;
 }
