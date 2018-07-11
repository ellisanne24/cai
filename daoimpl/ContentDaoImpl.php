<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/9/2018
 * Time: 5:34 PM
 */

class ContentDaoImpl implements ContentDao {

    private $connection;

    function __construct(\PDO $pdo){
        $this->connection = $pdo;
    }

    function addContent(Content $content)
    {
        $isSuccessful = false;
        try{
            $SQL = "CALL addContent(?,?,?,?)";
            $sp_addContent = $this->connection->prepare($SQL);
            $sp_addContent->bindParam(1,$content->getContentName(),PDO::PARAM_STR);
            $sp_addContent->bindParam(2,$content->getContentType(),PDO::PARAM_STR);
            $sp_addContent->bindParam(3,$content->getContentFileExtension(),PDO::PARAM_STR);
            $sp_addContent->bindParam(4,$content->getContentUrl(),PDO::PARAM_STR);
            $sp_addContent->execute();
            $isSuccessful = true;
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isSuccessful;
    }
}