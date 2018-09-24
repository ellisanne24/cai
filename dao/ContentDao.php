<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/9/2018
 * Time: 5:33 PM
 */

interface ContentDao {
    function addContent(Content $content);
    function addContentTopicLesson($contentId, $topicId, $lessonId);
    function addContentTopicLessonWSection($contentId, $topicId, $lessonId,$sectionId);

    function getAllVideos(); //para to sa laman ng dropdown sa publish video modal. ok?

    function getContentById($contentId);

} 