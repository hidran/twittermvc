<?php
function verifyData()
{
    $result = [
        'success' => 1,
        'msg' => ''
    ];
    $email = $_POST['email'] ?? '';
    if ($email) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if (!$email) {

        $result['success'] = 0;
        $result['msg'] .=  ' An email address is required<br>';
    }

    $password = $_POST['password'] ?? '';

    if (!$password || strlen($password) < 6) {
        $result['success'] = 0;
        $result['msg'] .=  ' Password is required and length greater than 6 <br>';
    }

    $result['password'] = $password;
    $result['email'] = $email;
    return $result;
}
function login()
{

    $result = verifyData();

    if ($result['success']) {
        return verifyUserLogin($result['email'], $result['password']);
    } else {
        return $result;
    }
}
function verifyUserLogin($email, $password)
{
    $result = [
        'success' => 1,
        'msg' => ''
    ];
    return $result;
}
function signup()
{

    $result = verifyData();

    if ($result['success']) {
        return insertUser($result['email'], $result['password']);
    } else {
        return $result;
    }
}

function insertUser($email, $password)
{
    $result = [
        'success' => 1,
        'msg' => ''
    ];
 try {
    $conn = dbConnect();
    $sql = 'select email from users where email=?';
    $sql2 = 'select email from users where email=:email';
    $stm = $conn->prepare($sql2);
    $res = $stm->execute([':email' => $email]);
    if ($res) {
        if ($stm->rowCount() > 0) {
            $result['msg'] = ' Email has already been taken';
            $result['success'] = 0;
            return $result;
        }
    } else {
        $result['msg'] = ' Error reading users table';
        $result['success'] = 0;
        return $result;
    }
    $sql = 'INSERT INTO users (email, password) values(:email, :password) ';
    $stm = $conn->prepare($sql);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $res = $stm->execute([':email' => $email, ':password' => $password]);
    if ($res && $stm->rowCount()) {
        $result['msg'] = ' User registered correctly';
        return $result;
    } else {
        $result['msg'] = ' Problem inserting user';
        $result['success'] = 0;
    }
} catch(Exception $e){
    $result['success'] =0;
    $result['msg'] = $e->getMessage();
}
    return $result;
}
