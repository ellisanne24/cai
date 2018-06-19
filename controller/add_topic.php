<?php

require_once "../dbutil/dbconnection.php";
require_once "../core/init.php";

$topicDaoImpl = new TopicDaoImpl($pdo);
$topic = new Topic();
$topicTitle = $_POST['modalInput_addTopicTitle'];
$topic->setTopicTitle($topicTitle);

$isSuccessful= $topicDaoImpl->addNewTopic($topic);
if($isSuccessful == true){
    echo $isSuccessful;
}else{
    echo false;
}