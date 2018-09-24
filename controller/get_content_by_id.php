<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 11:37 AM
 */

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$contentDaoImpl = new ContentDaoImpl($pdo);
$content = $contentDaoImpl->getContentById($_POST['videoContentId']);

echo json_encode($content);