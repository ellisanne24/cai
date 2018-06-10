<?php

/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/16/2018
 * Time: 2:30 PM
 */
class SchoolYear implements JsonSerializable
{

    private $schoolYearId;
    private $yearFrom;
    private $yearTo;
    private $startDate;
    private $endDate;
    private $dateCreated;
    private $isActive;
    private $isCurrent;

    /**
     * @return mixed
     */
    public function getIsCurrent()
    {
        return $this->isCurrent;
    }

    /**
     * @param mixed $isCurrent
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getSchoolYearId()
    {
        return $this->schoolYearId;
    }

    /**
     * @param mixed $schoolYearId
     */
    public function setSchoolYearId($schoolYearId)
    {
        $this->schoolYearId = $schoolYearId;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getYearFrom()
    {
        return $this->yearFrom;
    }

    /**
     * @param mixed $yearFrom
     */
    public function setYearFrom($yearFrom)
    {
        $this->yearFrom = $yearFrom;
    }

    /**
     * @return mixed
     */
    public function getYearTo()
    {
        return $this->yearTo;
    }

    /**
     * @param mixed $yearTo
     */
    public function setYearTo($yearTo)
    {
        $this->yearTo = $yearTo;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return [
            'schoolYearId' => $this->schoolYearId,
            'yearFrom' => $this->yearFrom,
            'yearTo' => $this->yearTo,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'dateCreated' => $this->dateCreated,
            'isActive' => $this->isActive,
            'isCurrent' => $this->isCurrent
        ];
    }

    public function toJSON(){
        return json_encode($this);
    }

} 