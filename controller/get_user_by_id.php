<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$userDaoImpl = new UserDaoImpl($pdo);
$user = $userDaoImpl->getUserById($_POST['id']);

echo json_encode($user);