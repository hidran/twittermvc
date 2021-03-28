<?php
function toggleFollow(){
    $result = [
        'success' => 0,
        'msg' => 'Invalid data',
        'following' => 0,
        'user_id' => ''
    ];
    if(!isValidToken($_POST['csrf'] ?? '')){
        $result['msg'] = 'Invalid token';
        return $result;
    }
    if(!($_POST['userId'] ?? '')){
        $result['msg'] = 'Invalid user id';
        return $result;
    }
    $following = $_POST['following'] ?? 0;
    $result['following'] =  $following ;
    $result['user_id'] = $_POST['userId'];
    try{
        $conn = dbConnect();
        $sql = 'REPLACE INTO followers (follower, followed, following) values (?,?,?)';
        $stm = $conn->prepare($sql);
       $res =  $stm->execute([getUserId(),$_POST['userId'], (int)(!$following)]);
       if($res){
           $result['success'] = 1;
           $result['msg'] = $following ? 'User is not followed anymore' : 'User followed';
           $result['following'] =  $following ? 0:1 ;

       }
    } catch (Exception $e ){
        $result['msg'] = $e->getMessage();
        $result['succcess'] = 0;


    }


   return $result;

}

function postTweet(){
    $result = [
        'success' => 0,
        'msg' => 'Invalid data',
        'following' => 0,
        'user_id' => ''
    ];
    if(!isValidToken($_POST['csrf'] ?? '')){
        $result['msg'] = 'Invalid token';
        return $result;
    }
    if(!($_POST['tweetpost'] ?? '')){
        $result['msg'] = 'Invalid tweet';
        return $result;
    }
    try{
        $conn = dbConnect();
        $sql = 'INSERT INTO tweets (user_id, tweet, datetime) values (?,?,NOW())';
        $stm = $conn->prepare($sql);
       $res =  $stm->execute(
           [getUserId(),$_POST['tweetpost']/*, date('Y-m-d H:i:s')*/]);
       if($res){
           $result['success'] = 1;
           $result['msg'] = 'Tweet posted!';         

       } else {
        $result['success'] = 0;
        $result['msg'] = 'Tweet not created!';  
       }
    } catch (Exception $e ){
        $result['msg'] = $e->getMessage();
        $result['succcess'] = 0;


    }
    return $result;
}