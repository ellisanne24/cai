<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 3/2/2018
 * Time: 7:25 PM
 */

interface UserDao {

    function add(User $user);
    function getAllUsers();
    function getAllTeacherUsers();
    function getUserBy($username, $password);
    function getUserById($userId);
} 