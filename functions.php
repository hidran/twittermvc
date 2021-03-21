<?php
function isValidToken($token){
    return $token === $_SESSION['csrf'];
}