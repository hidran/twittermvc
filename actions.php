<?php
session_start();
require 'functions.php';
require 'db/connection.php';

require 'controllers/LoginSignupController.php';
 $action = $_POST['action'] ?? '';

 if(function_exists($action)){
    echo json_encode($action());
     exit;
 }
