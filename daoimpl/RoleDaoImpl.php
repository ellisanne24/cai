<?php

/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/12/2018
 * Time: 12:44 PM
 */
class RoleDaoImpl implements RoleDao
{

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }


    function getAllRoles()
    {
        $roleList = [];
        try {
            $SQL = "CALL getAllRoles()";
            $sp_getAllRoles = $this->connection->prepare($SQL);
            $sp_getAllRoles->execute();

            $resultSet = $sp_getAllRoles->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultSet as $row) {
                $role = new Role();
                $role->setRoleId($row['role_id']);
                $role->setRolename($row['role_name']);
                $roleList[] = $role;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $roleList;
    }



    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }



} 