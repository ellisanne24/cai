<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$sectionDaoImpl = new SectionDaoImpl($pdo);
$sectionList = $sectionDaoImpl->getAllSectionsInfo();

echo json_encode($sectionList);