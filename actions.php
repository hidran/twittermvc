<?php
session_start();
require 'db/connection.php';
/*try {
    $db = dbConnect();
    $stm = $db->query('select * from users');

    var_dump($stm->rowCount());
}catch(Exception $e){
    die($e->getMessage());
}
*/
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