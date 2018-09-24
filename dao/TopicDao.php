<?php

interface TopicDao {
    function addNewTopic(Topic $topic);
    function updateTopic(Topic $topic);
    function getAllTopicTitle();
    function getAllTopicRecord();
    function deleteByIDTopic($topicId);
    function getTopicById($topicId);
    function addTopicLessons(Topic $topic, array $lessons);
}

