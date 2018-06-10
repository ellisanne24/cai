<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 6/6/2018
 * Time: 8:03 AM
 */

interface PersonDao {
    function addperson(Person $person);
    function updateperson(Person $dog);
    function deleteperson($personId);

} 