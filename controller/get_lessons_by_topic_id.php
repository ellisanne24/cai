<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 12:21 PM
 */

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$lessonDaoImpl = new LessonDaoImpl($pdo);
$lessonList = $lessonDaoImpl->getLessonsByTopicId($_POST['topicId']);



echo json_encode($lessonList);