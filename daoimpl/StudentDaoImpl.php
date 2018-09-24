<?php
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 9/23/2018
 * Time: 3:58 PM
 */

class StudentDaoImpl implements StudentDao {

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function getStudentNoByUserId($userId)
    {
        $studentNo = '';
        try{
            $SQL = "CALL `getStudentNoByUserId`(?)";
            $sp_getStudentNoByUserId = $this->connection->prepare($SQL);
            $sp_getStudentNoByUserId ->bindParam(1, $userId, PDO::PARAM_INT);
            $sp_getStudentNoByUserId->execute();

            $resultSet = $sp_getStudentNoByUserId->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row) {
                $studentNo = $row['student_no'];
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $studentNo;
    }


}