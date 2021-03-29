<?php 
require_once 'db/connection.php';
function findAllTweets(int $user_id = 0,$search = ''){
    if(!$user_id){
        $user_id = getUserId();
    }
    if(!$search){
        $search =$_GET['filter'] ?? null;
    }
    $res = [
        'data' => [],
        'msg' => ''
    ];
    try{
 $subselect = '(select following from followers f where f.followed = t.user_id and follower='.$user_id.' ) as following ';
 $sql = 'SELECT tweet, email, user_id, datetime, '. $subselect;
 $sql .= '  FROM tweets as t INNER JOIN users as u ON t.user_id=u.id ';
 if(strlen($search)>2){
     $sql .=' WHERE tweet like ? ';
 }
 $sql.= 'order by t.id DESC';

 //echo $sql;
 $conn = dbConnect();
 $stm = $conn->prepare($sql);
 $stm->execute(["%$search%"]);
 $res['data'] =  $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e){
 $res['msg'] = $e->getMessage();

    }
    return $res;
}