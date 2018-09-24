<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/20/2018
 * Time: 3:42 PM
 */

class SectionDaoImpl implements SectionDao{//generate implement right click lng

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function getAllSections()
    {
        // TODO: Implement getAllSections() method.
    }

    function getSectionInfoById($sectionId)
    {
        $section = new User();
        try{
            $SQL = "CALL getSectionInfoById(?)";
            $sp_getSectionInfoById = $this->connection->prepare($SQL);
            $sp_getSectionInfoById->bindParam(1,$sectionId,PDO::PARAM_INT);
            $sp_getSectionInfoById->execute();

            $resultSet = $sp_getSectionInfoById->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $schoolYear = new SchoolYear();
                $schoolYear->setSchoolYearId($row['schoolyear_id']);
                $schoolYear->setYearFrom($row['yearfrom']);
                $schoolYear->setYearTo($row['yearto']);
                $schoolYear->setStartDate($row['start_date']);
                $schoolYear->setEndDate($row['end_date']);
                $schoolYear->setDateCreated($row['date_created']);

                $section = new Section();
                $section->setSectionId($row['section_id']);
                $section->setSectionName($row['section_name']);
                $section->setDateAdded($row['date_added']);
                $section->setIsSectionActive($row['is_section_active']);
                $section->setSchoolYear($schoolYear);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $section;
    }

    function getAllActiveSections()
    {
        $sectionsList = [];
        try{
            $SQL = "CALL getAllActiveSections()";
            $sp_getAllSectionsInfo = $this->connection->prepare($SQL);
            $sp_getAllSectionsInfo->execute();

            $resultSet = $sp_getAllSectionsInfo->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $schoolYear = new SchoolYear();
                $schoolYear->setSchoolYearId($row['schoolyear_id']);
                $schoolYear->setYearFrom($row['yearfrom']);
                $schoolYear->setYearTo($row['yearto']);
                $schoolYear->setStartDate($row['start_date']);
                $schoolYear->setEndDate($row['end_date']);
                $schoolYear->setDateCreated($row['date_created']);

                $section = new Section();
                $section->setSectionId($row['section_id']);
                $section->setSectionName($row['section_name']);
                $section->setDateAdded($row['date_added']);
                $section->setIsSectionActive($row['is_section_active']);
                $section->setSchoolYear($schoolYear);

                $sectionsList[] = $section;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $sectionsList;
    }


    function getAllSectionsInfo()
    {
        $sectionsList = [];
        try{
            $SQL = "CALL getAllSectionsInfo()";
            $sp_getAllSectionsInfo = $this->connection->prepare($SQL);
            $sp_getAllSectionsInfo->execute();

            $resultSet = $sp_getAllSectionsInfo->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $schoolYear = new SchoolYear();
                $schoolYear->setSchoolYearId($row['schoolyear_id']);
                $schoolYear->setYearFrom($row['yearfrom']);
                $schoolYear->setYearTo($row['yearto']);
                $schoolYear->setStartDate($row['start_date']);
                $schoolYear->setEndDate($row['end_date']);
                $schoolYear->setDateCreated($row['date_created']);

                $section = new Section();
                $section->setSectionId($row['section_id']);
                $section->setSectionName($row['section_name']);
                $section->setDateAdded($row['date_added']);
                $section->setIsSectionActive($row['is_section_active']);
                $section->setSchoolYear($schoolYear);

                $sectionsList[] = $section;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $sectionsList;
    }

    function addNewSection(Section $section)
    {
        $isSuccessful = false;

        $SQL = "CALL `addSection`(?,?)"; //2 ung question mark kasi sa stored proc, 2 and parameter.
        try {
            $sp_addNewSection = $this-> connection->prepare($SQL);
            $sp_addNewSection-> bindParam(1, $section->getSectionName(), PDO::PARAM_STR); //string ang
            $sp_addNewSection->bindParam(2,$section->getSchoolYear()->getSchoolYearId(), PDO::PARAM_INT); //integer ang schoolyearid
            $sp_addNewSection-> execute();
            $isSuccessful = true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $isSuccessful;
    }


} 