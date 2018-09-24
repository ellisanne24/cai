<?php

class TopicDaoImpl implements TopicDao
{

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function addNewTopic(Topic $topic)
    {
        $isSuccessful = false;

        $SQL = "CALL `addTopic`(?)";
        try {
            $sp_addNewTopic = $this->connection->prepare($SQL);
            $sp_addNewTopic->bindParam(1, $topic->getTopicTitle(), PDO::PARAM_STR);
            $sp_addNewTopic->execute();
            $isSuccessful = true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $isSuccessful;
    }

    function updateTopic(Topic $topic)
    {

    }

    function getAllTopicTitle()
    {
        $topicsList = [];
        try{
            $SQL = "CALL getAllTopics()";
            $sp_getTopic = $this->connection->prepare($SQL);
            $sp_getTopic->execute();

            $resultSet = $sp_getTopic->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $topic = new Topic();
                $topic->setTopicId($row['topic_id']);
                $topic->setTopicTitle($row['topic_title']);
                $topicsList = $topic;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $topicsList;
    }

//    FOR LOADING TABLE
    function getAllTopicRecord()
    {
        $topicList = [];
        try{
            $SQL = "CALL `getAllTopicRecord`()";
            $sp_getAllTopicRecord = $this->connection->prepare($SQL);
            $sp_getAllTopicRecord->execute();

            $resultSet = $sp_getAllTopicRecord->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $topic = new Topic();
                $topic->setTopicId($row['topic_id']);
                $topic->setTopicTitle($row['topic_title']);

                $topicList[] = $topic;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $topicList;
    }

    function deleteByIDTopic($topicId)
    {

    }

    function getTopicById($topicId)
    {
        $topic = new Topic();
        try{
            $SQL = "CALL `getTopicById`(?)";
            $sp_getTopicById = $this->connection->prepare($SQL);
            $sp_getTopicById ->bindParam(1, $topicId, PDO::PARAM_INT);
            $sp_getTopicById->execute();

            $resultSet = $sp_getTopicById->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row) {

                $topic->setTopicId((int)$row['topic_id']);
                $topic->setTopicTitle($row['topic_title']);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
            return $topic;
    }

    function addTopicLessons(Topic $topic, array $lesson)
    {
        $lessonDaoImpl  = new LessonDaoImpl($this->connection);
        $lesson = new Lesson();

        foreach($lesson as $les) {

        }
    }


}

