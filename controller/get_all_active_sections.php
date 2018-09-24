<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 1:21 PM
 */

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$sectionDaoImpl = new SectionDaoImpl($pdo);
$sectionList = $sectionDaoImpl->getAllSectionsInfo();

echo json_encode($sectionList);