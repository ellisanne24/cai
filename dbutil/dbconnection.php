<?php


$host = "127.0.0.1";
$db = "cai_db";
$user = "root";
$pass = "jordanjordanjoan";
$charset = "utf8";

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

try {
    $opt = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new \PDO($dsn, $user, $pass, $opt);
}catch(Exception $e){
    $errorMessage = $e->getMessage();
    echo "<script type='text/javascript'>alert('$errorMessage');</script>";
}