<?php

class UserDaoImpl implements UserDao {

    private $connection;

    function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    function add(User $user)
    {
        $isSuccessful = false;

        $SQL = "CALL addUser(?,?,?,?,?,?)";
        try{
            $sp_addUser = $this->connection->prepare($SQL);
            $sp_addUser->bindParam(1,$user->getUsername(),PDO::PARAM_STR);
            $sp_addUser->bindParam(2,$user->getPassword(),PDO::PARAM_STR);
            $sp_addUser->bindParam(3,$user->getLastname(),PDO::PARAM_STR);
            $sp_addUser->bindParam(4,$user->getFirstname(),PDO::PARAM_STR);
            $sp_addUser->bindParam(5,$user->getMiddleinitial(),PDO::PARAM_STR);
            $sp_addUser->bindParam(6,$user->getRole()->getRoleId(),PDO::PARAM_INT);
            $sp_addUser->execute();
            $isSuccessful = true;
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return $isSuccessful;
    }

    function getAllUsers()
    {
        $usersList = [];
        try{
            $SQL = "CALL getAllUsers()";
            $sp_getUser = $this->connection->prepare($SQL);
            $sp_getUser->execute();

            $resultSet = $sp_getUser->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $role = new Role();
                $role->setRoleId($row['role_id']);
                $role->setRolename($row['role_name']);

                $user = new User();
                $user->setId($row['user_id']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setLastname($row['lastname']);
                $user->setFirstname($row['firstname']);
                $user->setMiddleinitial($row['middle']);
                $user->setIsActive($row['is_user_active'] === 1? true : false);
                $user->setRole($role);

                $usersList[] = $user;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $usersList;
    }

    function getAllTeacherUsers()
    {
        $teacherList = [];
        try{
            $SQL = "CALL getAllActiveTeacherUsers()";
            $sp_getAllActiveTeacherUsers = $this->connection->prepare($SQL);
            $sp_getAllActiveTeacherUsers->execute();

            $resultSet = $sp_getAllActiveTeacherUsers->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $role = new Role();
                $role->setRoleId($row['role_id']);
                $role->setRolename($row['role_name']);

                $user = new User();
                $user->setId($row['user_id']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setLastname($row['lastname']);
                $user->setFirstname($row['firstname']);
                $user->setMiddleinitial($row['middle']);
                $user->setIsActive($row['is_user_active'] === 1? true : false);
                $user->setRole($role);

                $teacherList[] = $user;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $teacherList;
    }


    function getUserBy($username, $password)
    {
        $user = new User();
        try{
            $SQL = "CALL getUserByUsernamePassword(?,?)";
            $sp_getUser = $this->connection->prepare($SQL);
            $sp_getUser->bindParam(1,$username,PDO::PARAM_STR);
            $sp_getUser->bindParam(2,$password,PDO::PARAM_STR);
            $sp_getUser->execute();

            $resultSet = $sp_getUser->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $role = new Role();
                $role->setRoleId($row['role_id']);
                $role->setRolename($row['role_name']);
                $role->setIsRoleActive($row['is_role_active']);

                $user->setId($row['user_id']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setLastname($row['lastname']);
                $user->setFirstname($row['firstname']);
                $user->setMiddleinitial($row['middle']);
                $user->setIsActive($row['is_user_active'] === 1? true: false);
                $user->setRole($role);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $user;
    }

    function getUserById($userId)
    {
        $user = new User();
        try{
            $SQL = "CALL getUserById(?)";
            $sp_getUserById = $this->connection->prepare($SQL);
            $sp_getUserById->bindParam(1,$userId,PDO::PARAM_INT);
            $sp_getUserById->execute();

            $resultSet = $sp_getUserById->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultSet as $row){
                $role = new Role();
                $role->setRoleId($row['role_id']);
                $role->setRolename($row['role_name']);
                $role->setIsRoleActive($row['is_role_active']);

                $user->setId($row['user_id']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setLastname($row['lastname']);
                $user->setFirstname($row['firstname']);
                $user->setMiddleinitial($row['middle']);
                $user->setIsActive($row['is_user_active'] === 1? true: false);
                $user->setRole($role);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $user;
    }


} 