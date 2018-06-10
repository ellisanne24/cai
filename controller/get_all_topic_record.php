<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$topicDaoImpl = new TopicDaoImpl($pdo);
$topicsList = $topicDaoImpl->getAllTopicRecord();

echo json_encode($topicsList);