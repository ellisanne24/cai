<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/9/2018
 * Time: 5:34 PM
 */

class ContentDaoImpl implements ContentDao {

    private $connection;

    function __construct(\PDO $pdo){
        $this->connection = $pdo;
    }

    function addContent(Content $content)
    {
        $isSuccessful = false;
        try{
            $SQL = "CALL addContent(?,?,?,?,?)";
            $sp_addContent = $this->connection->prepare($SQL);
            $sp_addContent->bindParam(1,$content->getContentName(),PDO::PARAM_STR);
            $sp_addContent->bindParam(2,$content->getContentType(),PDO::PARAM_STR);
            $sp_addContent->bindParam(3,$content->getContentCategory(),PDO::PARAM_INT);
            $sp_addContent->bindParam(4,$content->getContentFileExtension(),PDO::PARAM_STR);
            $sp_addContent->bindParam(5,$content->getContentUrl(),PDO::PARAM_STR);
            $sp_addContent->execute();
            $isSuccessful = true;
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isSuccessful;
    }




    function addContentTopicLesson($contentId, $topicId, $lessonId)
    {
        $isSuccessful = false;
        try{
            $SQL = "CALL `addContentTopicLesson`(?,?,?)";
            $sp_addContentTopicLesson = $this->connection->prepare($SQL);
            $sp_addContentTopicLesson->bindParam(1,$contentId, PDO::PARAM_INT);
            $sp_addContentTopicLesson->bindParam(2,$topicId, PDO::PARAM_INT);
            $sp_addContentTopicLesson->bindParam(3,$lessonId, PDO::PARAM_INT);


            $sp_addContentTopicLesson->execute();
            $isSuccessful = true;
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isSuccessful;
    }

    function addContentTopicLessonWSection($contentId, $topicId, $lessonId, $sectionId)
    {
        $isSuccessful = false;
        try{
            $SQL = "CALL `addContentTopicLessonWSection`(?,?,?,?)";
            $sp_addContentTopicLessonWSection = $this->connection->prepare($SQL);
            $sp_addContentTopicLessonWSection->bindParam(1,$contentId, PDO::PARAM_INT);
            $sp_addContentTopicLessonWSection->bindParam(2,$topicId, PDO::PARAM_INT);
            $sp_addContentTopicLessonWSection->bindParam(3,$lessonId, PDO::PARAM_INT);
            $sp_addContentTopicLessonWSection->bindParam(4,$sectionId, PDO::PARAM_INT);

            $sp_addContentTopicLessonWSection->execute();
            $isSuccessful = true;
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isSuccessful;
    }

    function getAllVideos()
    {
        $videoTitleList = [];
        try{
            $SQL = "CALL getAllVideos()";
            $sp_getAllVideoTitles = $this->connection->prepare($SQL);
            $sp_getAllVideoTitles->execute();

            $resultSet = $sp_getAllVideoTitles->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $content = new Content();
                $content->setContentId($row['content_id']);
                $content->setContentName($row['content_name']);
                $content->setContentType($row['content_type']);
                $content->setContentCategory($row['content_category']);
                $content->setContentFileExtension($row['content_file_extension']);
                $content->setContentUrl($row['content_url']);
                $content->setDateAdded($row['date_added']);
                $content->setIsContentActive($row['date_added']);
                $content->setIsPublished($row['is_published']);

                $videoTitleList[] = $content;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $videoTitleList;
    }

    function getContentById($contentId)
    {
        $content = new Content();
        try{
            $SQL = "CALL getContentById(?)";
            $sp_getContentById = $this->connection->prepare($SQL);
            $sp_getContentById ->bindParam(1, $contentId, PDO::PARAM_INT);
            $sp_getContentById->execute();

            $resultSet = $sp_getContentById->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row) {
                $content = new Content();
                $content->setContentId($row['content_id']);
                $content->setContentName($row['content_name']);
                $content->setContentType($row['content_type']);
                $content->setContentCategory($row['content_category']);
                $content->setContentFileExtension($row['content_file_extension']);
                $content->setContentUrl($row['content_url']);
                $content->setDateAdded($row['date_added']);
                $content->setIsContentActive($row['date_added']);
                $content->setIsPublished($row['is_published']);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $content;
    }


}