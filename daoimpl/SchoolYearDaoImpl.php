<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/16/2018
 * Time: 2:29 PM
 */

class SchoolYearDaoImpl implements SchoolYearDao{

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function getAllSchoolYear()
    {
        $schoolYearList = [];
        try {
            $SQL = "CALL getAllSchoolYear()";
            $sp_getAllSchoolYear = $this->connection->prepare($SQL);
            $sp_getAllSchoolYear->execute();

            $resultSet = $sp_getAllSchoolYear->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultSet as $row) {
                $schoolYear = new SchoolYear();
                $schoolYear->setSchoolYearId($row['schoolyear_id']);
                $schoolYear->setYearFrom($row['yearfrom']);
                $schoolYear->setYearTo($row['yearto']);
                $schoolYear->setStartDate($row['start_date']);
                $schoolYear->setEndDate($row['end_date']);
                $schoolYear->setDateCreated($row['date_created']);
                $schoolYear->setIsActive($row['is_active']);
                $schoolYear->setIsCurrent($row['is_current']);
                $schoolYearList[] = $schoolYear;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $schoolYearList;
    }

    function getCurrentSchoolYear()
    {
        $schoolYear = new SchoolYear();
        try {
            $SQL = "CALL getCurrentSchoolYear()";
            $sp_getAllSchoolYear = $this->connection->prepare($SQL);
            $sp_getAllSchoolYear->execute();

            $resultSet = $sp_getAllSchoolYear->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultSet as $row) {
                $schoolYear->setSchoolYearId($row['schoolyear_id']);
                $schoolYear->setYearFrom($row['yearfrom']);
                $schoolYear->setYearTo($row['yearto']);
                $schoolYear->setStartDate($row['start_date']);
                $schoolYear->setEndDate($row['end_date']);
                $schoolYear->setDateCreated($row['date_created']);
                $schoolYear->setIsActive($row['is_active']);
                $schoolYear->setIsCurrent($row['is_current']);
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $schoolYear;
    }


} 