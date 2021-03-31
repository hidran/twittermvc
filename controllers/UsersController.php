<?php
function findAllUsers()
{
    $conn = dbConnect();
    $sql = 'select id, email from users order by email';
    $stm = $conn->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
