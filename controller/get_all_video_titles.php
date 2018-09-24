<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 10:21 AM
 */

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$contentDaoImpl = new ContentDaoImpl($pdo);
$videoList = $contentDaoImpl->getAllVideos();

echo json_encode($videoList);