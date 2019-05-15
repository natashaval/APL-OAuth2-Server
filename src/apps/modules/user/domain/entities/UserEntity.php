<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:21
 */

namespace Domain\User\Entities;

class UserEntity
{
    private $id;
    private $name;
    private $password;
    private $otpkey;

    /**
     * @return int
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

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getOtpkey()
    {
        return $this->otpkey;
    }

    /**
     * @param mixed $otpkey
     */
    public function setOtpkey($otpkey)
    {
        $this->otpkey = $otpkey;
    }


}