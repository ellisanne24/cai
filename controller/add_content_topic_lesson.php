<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 1:34 PM
 */

require_once "../dbutil/dbconnection.php";
require_once "../core/init.php";

$contentDaoImpl = new ContentDaoImpl($pdo);
$contentId = $_POST['contentId'];
$topicId = $_POST['topicId'];
$lessonId = $_POST['lessonId'];

$isSuccessful= $contentDaoImpl->addContentTopicLesson($contentId,$topicId,$lessonId);

if($isSuccessful == true){
    echo $isSuccessful;
}else{
    echo false;
}