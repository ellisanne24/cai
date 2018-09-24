<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/22/2018
 * Time: 8:48 PM
 */

class LessonDaoImpl implements LessonDao {

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function addLesson(Lesson $lesson)
    {
        $isSuccessful = false;

        $SQL = "CALL `addLesson`(?,?)"; //2 ung question mark kasi sa stored proc, 2 and parameter.
        try {
            $sp_addLesson = $this-> connection->prepare($SQL);
            $sp_addLesson-> bindParam(1, $lesson->getLessonNo(), PDO::PARAM_INT); //INT ang ineexpect ng stored proc na addLesson para sa first parameter
            $sp_addLesson->bindParam(2,$lesson->getLessonTitle(), PDO::PARAM_STR);
            $sp_addLesson-> execute();
            $isSuccessful = true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $isSuccessful;
    }

    function getLessonsByTopicId($topicId)
    {
        $lessonsList = [];
        try{
            $SQL = "CALL getLessonsByTopicId(?)";
            $sp_getLessonsByTopicId = $this->connection->prepare($SQL);
            $sp_getLessonsByTopicId->bindParam(1,$topicId,PDO::PARAM_INT);
            $sp_getLessonsByTopicId->execute();

            $resultSet = $sp_getLessonsByTopicId->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $lesson = new Lesson();
                $lesson->setLessonId($row['lesson_id']);
                $lesson->setLessonNo($row['lesson_no']);
                $lesson->setLessonTitle($row['lesson_title']);
                $lesson->setIsLessonRemoved($row['is_removed']);
                $lesson->setIsLessonActive($row['is_active']);

                $lessonsList[] =$lesson;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $lessonsList;
    }


} 