<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 6/6/2018
 * Time: 8:01 AM
 */

class Person implements  JsonSerializable {

    private $personId;

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }




    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }


} 