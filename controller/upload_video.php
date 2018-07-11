<?php

require_once '../dbutil/dbconnection.php';
require_once '../core/init.php';

$videoFile = $_FILES['file'];
$fileSize = $_FILES['file']['size'];

if($fileSize > 0){
    $isSavedToFolder = saveVideoToUploadsFolder($videoFile);
    echo $isSavedToFolder;
//    if($isSavedToFolder){
//        if(isset($_POST['videoTitle'])){
//            $fileName = $_FILES['file']['name'];
//            $fileTmpName = $_FILES['file']['tmp_name'];
//            $fileSize = $_FILES['file']['size'];
//            $fileError = $_FILES['file']['error'];
//            $fileExtension = explode('.', $fileName);
//            $fileActualExtension = strtolower(end($fileExtension));
//            $fileDestination = 'uploads/' . $fileName;
//
//            $content = new Content();
//            $content->setContentName($fileName);
//            $content->setContentFileExtension($fileActualExtension);
//            $content->setContentType('video');
//            $content->setContentUrl($fileDestination);
//
//            $isAddedToDb = saveContentToDB($pdo,$content);
//            if($isAddedToDb){
//                echo "Successfully saved video file";
//            }else{
//                echo "Failed to save video file";
//                //delete file by filename from folder
//            }
//        }else{
//
//        }
//    }
}

function saveContentToDB($pdo,$content){
    $contentDaoImpl = new ContentDaoImpl($pdo);
    $content = new Content();
    $isSuccessful = $contentDaoImpl->addContent($content);
    return $isSuccessful;
}

function saveVideoToUploadsFolder($videoFile)
{
        $isSuccessful = false;
        $file = $_FILES['file'];
//        print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        echo "Filename: ".$fileName . " " . "FileTmpName: " . $fileTmpName .
            " " . "FileSize: " . $fileSize . " " . "FileError: " . $fileError;

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('mp4');
        echo "fileActualExt: " . $fileActualExt;
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 150000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    $isSuccessful = move_uploaded_file($fileTmpName, $fileDestination);

                } else {
                    echo "You file is too big";

                }
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "You cannot upload files of this type";
        }
    return $isSuccessful;
}






