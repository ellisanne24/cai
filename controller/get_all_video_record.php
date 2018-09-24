<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$videoDaoImpl = new videoDaoImpl($pdo);
$topicsList = $contentDaoImpl->getAllTopicRecord();

echo json_encode($topicsList);