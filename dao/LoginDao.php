<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 5/9/2018
 * Time: 5:33 PM
 */

interface LoginDao {
    function isValid(User $user);
} 