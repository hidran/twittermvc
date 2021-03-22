<?php 
require_once 'db/connection.php';
function findAllTweets(){
    $res = [
        'data' => [],
        'msg' => ''
    ];
    try{
 $sql = 'SELECT tweet, email, user_id, datetime FROM `tweets`  as t INNER JOIN users as u ON t.user_id=u.id order by datetime DESC';

 $conn = dbConnect();
 $stm = $conn->query($sql);
 $res['data'] =  $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e){
 $res['msg'] = $e->getMessage();

    }
    return $res;
}