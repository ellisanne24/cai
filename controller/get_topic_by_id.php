<?php
require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$topicDaoImpl = new TopicDaoImpl($pdo);
$topic = $topicDaoImpl->getTopicById($_POST['id']);

echo ($topic->toJSON());