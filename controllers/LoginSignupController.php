<?php
function verifyData(){
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

  $result['password'] = $password;
  $result['email'] = $email;
  return $result;
}
function login(){
  
   $result = verifyData();
  
  if($result['success']){
      return verifyUserLogin($result['email'], $result['password']);
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
   
    $result = verifyData();
  
    if($result['success']){
        return insertUser($result['email'], $result['password']);
    } else {
       return $result;
    }
}

function insertUser($email, $password){
    $result = [
        'success' => 1,
        'msg' => ''
          ];
          return $result;
}
