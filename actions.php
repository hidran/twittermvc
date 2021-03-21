<?php
require 'controllers/LoginSignupController.php';
 $action = $_POST['action'] ?? '';

 if(function_exists($action)){
    echo json_encode($action());
     exit;
 }
/*
 switch ($action) {
     case 'login':
         login();
         break;
         case 'signup':
            signup();
            break;
     default:
       
         break;
 }
 */