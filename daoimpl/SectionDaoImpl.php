<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/20/2018
 * Time: 3:42 PM
 */

class SectionDaoImpl implements SectionDao{//generate implement right click lng

    function getAllSections()
    {
        // TODO: Implement getAllSections() method.
    }

    function addNewSection(Section $section)
    {
        $isSuccessful = false;

        $SQL = "CALL `addSection`(?)";
        try {
            $sp_addNewSection = $this->connection->prepare($SQL);
            $sp_addNewSection->bindParam(1, $section->getSectionName(), PDO::PARAM_STR);
            $sp_addNewSection->execute();
            $isSuccessful = true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $isSuccessful;
    }


} 