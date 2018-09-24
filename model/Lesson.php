<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 3/1/2018
 * Time: 7:27 PM
 */

class Lesson implements JsonSerializable{
    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    private $topicId;
    private $lessonId;
    private $lessonNo;
    private $lessonTitle;
    private $isLessonActive;
    private $isLessonRemoved;
    /**
     * @var SchoolYear
     */
    private $schoolYear;




    function jsonSerialize()
    {
        return [
            'topicId' => $this->topicId,
            'lessonId' => $this->lessonId,
            'lessonNo' => $this->lessonNo,
            'lessonTitle' => $this->lessonTitle,
            '$isLessonActive' => $this->isLessonActive,
            'isLessonRemoved' => $this->isLessonRemoved,
//            'schoolyearid '=>$this->schoolYear->getSchoolYearId(),
//            'schoolyearfrom'=>$this->schoolYear->getYearFrom(),
//            'schoolyearto'=>$this->schoolYear->getYearTo(),
//            'schoolyeariscurrent'=>$this->schoolYear->getIsCurrent(),
//            'schoolyearstartdate' => $this->schoolYear->getStartDate(),
//            'schoolyearenddate' => $this->schoolYear->getEndDate()
        ];
    }

    /**
     * @return mixed
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * @param mixed $topicId
     */
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }



    /**
     * @return mixed
     */
    public function getIsLessonActive()
    {
        return $this->isLessonActive;
    }

    /**
     * @param mixed $isLessonActive
     */
    public function setIsLessonActive($isLessonActive)
    {
        $this->isLessonActive = $isLessonActive;
    }

    /**
     * @return mixed
     */
    public function getIsLessonRemoved()
    {
        return $this->isLessonRemoved;
    }

    /**
     * @param mixed $isLessonRemoved
     */
    public function setIsLessonRemoved($isLessonRemoved)
    {
        $this->isLessonRemoved = $isLessonRemoved;
    }

    /**
     * @return mixed
     */
    public function getLessonId()
    {
        return $this->lessonId;
    }

    /**
     * @param mixed $lessonId
     */
    public function setLessonId($lessonId)
    {
        $this->lessonId = $lessonId;
    }

    /**
     * @return mixed
     */
    public function getLessonNo()
    {
        return $this->lessonNo;
    }

    /**
     * @param mixed $lessonNo
     */
    public function setLessonNo($lessonNo)
    {
        $this->lessonNo = $lessonNo;
    }

    /**
     * @return mixed
     */
    public function getLessonTitle()
    {
        return $this->lessonTitle;
    }

    /**
     * @param mixed $lessonTitle
     */
    public function setLessonTitle($lessonTitle)
    {
        $this->lessonTitle = $lessonTitle;
    }

    /**
     * @return SchoolYear
     */
    public function getSchoolYear()
    {
        return $this->schoolYear;
    }

    /**
     * @param SchoolYear $schoolYear
     */
    public function setSchoolYear($schoolYear)
    {
        $this->schoolYear = $schoolYear;
    }




} 