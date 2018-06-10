<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 3/1/2018
 * Time: 7:27 PM
 */

class User implements  JsonSerializable{

    private $id;
    private $username;
    private $password;
    private $lastname;
    private $firstname;
    private $middleinitial;
    private $isActive;

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @var Role
     */
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getMiddleinitial()
    {
        return $this->middleinitial;
    }

    /**
     * @param mixed $middleinitial
     */
    public function setMiddleinitial($middleinitial)
    {
        $this->middleinitial = $middleinitial;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middleinitial' => $this->middleinitial,
            'isactive' => $this->isActive,
            'roleId' => $this->role->getRoleId(),
            'roleName' =>$this->role->getRolename(),
        ];
    }

    public function toJSON(){
        return json_encode($this);
    }

} 