<?php

class Section implements  JsonSerializable{

    private $sectionId;
    private $sectionName;
    private $dateAdded;
    private $isSectionActive;

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * @param mixed $date_added
     */
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }

    /**
     * @return mixed
     */
    public function getIsSectionActive()
    {
        return $this->isSectionActive;
    }

    /**
     * @param mixed $isSectionActive
     */
    public function setIsSectionActive($isSectionActive)
    {
        $this->isSectionActive = $isSectionActive;
    }

    /**
     * @return mixed
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }

    /**
     * @param mixed $sectionId
     */
    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;
    }

    /**
     * @return mixed
     */
    public function getSectionName()
    {
        return $this->sectionName;
    }

    /**
     * @param mixed $sectionName
     */
    public function setSectionName($sectionName)
    {
        $this->sectionName = $sectionName;
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
            'sectionId' => $this->sectionId,
            'sectionName' => $this->setSectionName,
            'dateAdded' => $this->dateAdded,
            'isSectionActive' => $this->isSectionActive
        ];
    }


} 