<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/22/2018
 * Time: 8:45 PM
 */

interface LessonDao {

    function addLesson(Lesson $lesson);
    function getLessonsByTopicId($topicId);
} 