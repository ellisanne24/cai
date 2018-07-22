<?php


require_once "../dbutil/dbconnection.php";
require_once "../core/init.php";

$sectionDaoImpl = new SectionDaoImpl($pdo); //$sectionDaoimpl - var na gawa mo, new SectionDaoImpl($pdo)- galing sa daoimpl
$section = new Section(); //$section ai var na gawa mo, "new Section()- galing sa model"
$sectionName = $_POST['modalInput_addNewSection']; //$sectionName - var na gawa mo
$section->setSectionName($sectionName); // $section - var na nasa itaas ka-name nya. Tapos ->setSectionName-rightclick galing ang info sa model. tapos ($sectionName)-galing sa itaas ka-name nya.

$isSuccessful= $sectionDaoImpl->addNewSection($section);//right click galing sa daoimpl, kuhain ang addSection galing sa Sectiondaoimpl.
if($isSuccessful == true){
    echo $isSuccessful;
}else{
    echo false;
}