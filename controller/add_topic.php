<?php

require_once "../dbutil/dbconnection.php";
require_once "../core/init.php";

$topicDaoImpl = new TopicDaoImpl($pdo);
$topic = new Topic();
$topicTitle = $_POST['topictitle'];
$topic->setTopicTitle($topicTitle);

$isSuccessful= $topicDaoImpl->addNewTopic($topic);
if($isSuccessful){
    echo $isSuccessful;
}