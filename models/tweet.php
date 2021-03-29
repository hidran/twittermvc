<?php 
require_once 'db/connection.php';
function findAllTweets(int $user_id,$search = ''){
    $res = [
        'data' => [],
        'msg' => ''
    ];
    try{
 $sql = 'SELECT tweet, email, user_id, datetime, (select following from followers f where f.followed = t.user_id and follower='.$user_id.' ) as following ';
 $sql .= '  FROM tweets as t INNER JOIN users as u ON t.user_id=u.id  order by t.id DESC';

 //echo $sql;
 $conn = dbConnect();
 $stm = $conn->query($sql);
 $res['data'] =  $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e){
 $res['msg'] = $e->getMessage();

    }
    return $res;
}