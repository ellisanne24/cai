<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

if(isset($_POST['un']) && isset($_POST['pw']) && isset($_POST['ln']) && isset($_POST['fn']) &&
    isset($_POST['mn']) && isset($_POST['rId'])){

    $userDaoImpl = new UserDaoImpl($pdo);
    $role = new Role();
    $role->setRoleId($_POST['rId']);
    $role->setRolename($_POST['rName']);
    $user = new User();
    $user->setRole($role);
    $user->setUsername($_POST['un']);
    $user->setPassword($_POST['pw']);
    $user->setLastname($_POST['ln']);
    $user->setFirstname($_POST['fn']);
    $user->setMiddleinitial($_POST['mn']);
    $isSuccessful = $userDaoImpl->add($user);
    echo $isSuccessful;
}