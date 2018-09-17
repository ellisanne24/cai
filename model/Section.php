<?php

class Section implements  JsonSerializable{

    private $sectionId;
    private $sectionName;
    private $dateAdded;
    private $isSectionActive;

    /**
     * @var SchoolYear
     */
    private $schoolYear;

    function jsonSerialize()
    {
        return [
            'sectionId' => $this->sectionId,
            'sectionName' => $this->sectionName,
            'dateAdded' => $this->dateAdded,
            'isSectionActive' => $this->isSectionActive,
            'schoolyearid '=>$this->schoolYear->getSchoolYearId(),
            'schoolyearfrom'=>$this->schoolYear->getYearFrom(),
            'schoolyearto'=>$this->schoolYear->getYearTo(),
            'schoolyeariscurrent'=>$this->schoolYear->getIsCurrent(),
            'schoolyearstartdate' => $this->schoolYear->getStartDate(),
            'schoolyearenddate' => $this->schoolYear->getEndDate()
        ];
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




    public function getDateAdded()
    {
        return $this->date_added;
    }


    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }


    public function getIsSectionActive()
    {
        return $this->isSectionActive;
    }


    public function setIsSectionActive($isSectionActive)
    {
        $this->isSectionActive = $isSectionActive;
    }


    public function getSectionId()
    {
        return $this->sectionId;
    }


    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;
    }

    public function getSectionName()
    {
        return $this->sectionName;
    }


    public function setSectionName($sectionName)
    {
        $this->sectionName = $sectionName;
    }





} 