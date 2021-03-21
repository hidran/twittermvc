<?php
function login(){
  
   $result = [
 'success' => 1,
 'msg' => ''
   ];
  $email = $_POST['email'] ?? '';
  if($email){
   $email = filter_var($email,FILTER_VALIDATE_EMAIL);
  }

  if(!$email){
    
     $result['success'] = 0;
      $result['msg'] .=  ' An email address is required<br>';
  }

  $password = $_POST['password'] ?? '';
  
  if(!$password || strlen($password)< 6){
    $result['success'] = 0;
      $result['msg'] .=  ' Password is required and length greater than 6 <br>';  
  }
  if($result['success']){
      return verifyUserLogin($email, $password);
  } else {
     return $result;
  }
}
function verifyUserLogin($email, $password){
    $result = [
        'success' => 1,
        'msg' => ''
          ];
          return $result;
}
function signup(){
    echo  'signup';
}