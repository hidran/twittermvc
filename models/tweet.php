<?php
require_once 'db/connection.php';
function findAllTweets(int $user_id = 0, $search = '', $userTweets = false)
{

    $loggedInUserid  = (int) getUserId();

    if (!$search) {
        $search = $_GET['filter'] ?? null;
    }
    $res = [
        'data' => [],
        'msg' => ''
    ];
    try {
        $subselect = '(select following from followers f where f.followed = t.user_id and follower=' . $loggedInUserid . ' ) as following ';
        $sql = 'SELECT tweet, email, user_id, datetime, ' . $subselect;
        $sql .= '  FROM tweets as t INNER JOIN users as u ON t.user_id=u.id ';
        $sql .= 'where 1=1 ';
        if ($userTweets) {
            $sql .= " AND user_id ='$loggedInUserid' ";
        } else if ($user_id) {
            $sql .= " AND user_id ='$user_id' ";
        }
        if (strlen($search) > 2) {
            $sql .= ' AND tweet like ? ';
        }
        $sql .= 'order by t.id DESC';

        //   echo $sql;
        $conn = dbConnect();

        $stm = $conn->prepare($sql);
        $stm->execute(["%$search%"]);
        $res['data'] =  $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $res['msg'] = $e->getMessage();
    }
    return $res;
}
