<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$userDaoImpl = new UserDaoImpl($pdo);
$usersList = $userDaoImpl->getAllUsers();

echo json_encode($usersList);