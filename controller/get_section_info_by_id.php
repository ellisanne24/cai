<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 8/27/2018
 * Time: 2:28 PM
 */

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$sectionDaoImpl = new SectionDaoImpl($pdo);
$section = $sectionDaoImpl->getUserById($_POST[' ']);

echo json_encode($section);