<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

if(isset($_POST['completeYoutubeUrl']) && isset($_POST['youtubeVideoTitle'])){
    $contentUrl = $_POST['completeYoutubeUrl'];
    $contentName = $_POST['youtubeVideoTitle'];
    $contentCategory = $_POST['contentCategory'];

    $content = new Content();
    $content->setContentCategory($contentCategory);
    $content->setContentName($contentName);
    $content->setContentUrl($contentUrl);
    $content->setContentType('video');
    $content->setContentFileExtension('yt');

    $isSuccessful = addContentToDb($pdo,$content);

    if($isSuccessful){
        echo "Successfully saved youtube video";
    }else{
        echo "encountered error while saving youtube video";
    }
}else{
    echo "Youtube URL and Youtube Video Title is not set";
}


function addContentToDb($pdo,$content){
    $contentDaoImpl = new ContentDaoImpl($pdo);
    $isSuccessful = $contentDaoImpl->addContent($content);
    return $isSuccessful;
}








