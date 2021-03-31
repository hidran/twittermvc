<?php
session_start();
require 'functions.php';
require 'db/connection.php';
require 'controllers/UsersController.php';
// 

require 'views/header.php';

$users = findAllUsers();

require 'views/users.php';
require 'views/footer.php';
