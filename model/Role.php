<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 3/2/2018
 * Time: 7:49 PM
 */

class Role implements JsonSerializable{

    private $roleId;
    private $rolename;
    private $isRoleActive;

    /**
     * @return mixed
     */
    public function getIsRoleActive()
    {
        return $this->isRoleActive;
    }

    /**
     * @param mixed $isRoleActive
     */
    public function setIsRoleActive($isRoleActive)
    {
        $this->isRoleActive = $isRoleActive;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    public function getRolename()
    {
        return $this->rolename;
    }

    public function setRolename($rolename)
    {
        $this->rolename = $rolename;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->roleId,
            'rolename' => $this->rolename,
            'isRoleActive' => $this->isRoleActive
        ];
    }

    public function toJSON(){
        return json_encode($this);
    }
} 