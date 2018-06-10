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

        $SQL = "CALL `add_new_topic`(?)";
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


    /**
     * For filling dropdown
     * @return array
     */
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

    function getAllTopicRecord()
    {
        $topicRecord = [];
        try{
            $SQL = "CALL getAllTopicRecord() ";
            $sp_getTopicRecord = $this->connection->prepare($SQL);
            $sp_getTopicRecord->execute();

            $resultSet = $sp_getTopicRecord->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $topic = new Topic();
                $topic->setTopicId($row['topic_id']);
                $topic->setTopicTitle($row['topic_title']);
                $topicRecord = $topic;
            }

        }catch(PDOException $e){
            die($e->getMessage());

        }
        return $topicRecord;

    }


    function deleteByIDTopic($topicId)
    {

    }


}