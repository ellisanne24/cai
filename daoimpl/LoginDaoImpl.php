<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/9/2018
 * Time: 5:34 PM
 */

class LoginDaoImpl implements LoginDao {

    private $connection;

    function __construct(\PDO $pdo){
        $this->connection = $pdo;
    }

    function isValid(User $user)
    {
        $isValid = 0;
        try{
            $SQL = "CALL isLoginValid(?,?)";
            $sp_isLoginValid = $this->connection->prepare($SQL);
            $sp_isLoginValid->bindParam(1,$user->getUsername(),PDO::PARAM_STR);
            $sp_isLoginValid->bindParam(2,$user->getPassword(),PDO::PARAM_STR);
            $sp_isLoginValid->execute();

            $resultSet = $sp_isLoginValid->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $isValid = $row['isValid'];
            }
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isValid;
    }


} 