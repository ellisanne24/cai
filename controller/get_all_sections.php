<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$roleDaoImpl = new RoleDaoImpl($pdo);
$roleList = $roleDaoImpl->getAllRoles();

echo json_encode($roleList);