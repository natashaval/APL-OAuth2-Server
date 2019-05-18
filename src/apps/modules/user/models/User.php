<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/18/2019
 * Time: 13:29
 */

namespace App\User\Models;

class User
{
    private $user_id;
    private $user_name;
    private $user_password;
    private $user_email;
    private $user_regdate;
    private $user_regnumber;
    private $user_level;
    private $user_otpKey;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserRegdate()
    {
        return $this->user_regdate;
    }

    /**
     * @param mixed $user_regdate
     */
    public function setUserRegdate($user_regdate)
    {
        $this->user_regdate = $user_regdate;
    }

    /**
     * @return mixed
     */
    public function getUserFirstname()
    {
        return $this->user_firstname;
    }

    /**
     * @param mixed $user_firstname
     */
    public function setUserFirstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;
    }

    /**
     * @return mixed
     */
    public function getUserLastname()
    {
        return $this->user_lastname;
    }

    /**
     * @param mixed $user_lastname
     */
    public function setUserLastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;
    }

    /**
     * @return mixed
     */
    public function getUserRegnumber()
    {
        return $this->user_regnumber;
    }

    /**
     * @param mixed $user_regnumber
     */
    public function setUserRegnumber($user_regnumber)
    {
        $this->user_regnumber = $user_regnumber;
    }

    /**
     * @return mixed
     */
    public function getUserLevel()
    {
        return $this->user_level;
    }

    /**
     * @param mixed $user_level
     */
    public function setUserLevel($user_level)
    {
        $this->user_level = $user_level;
    }



    /**
     * @return mixed
     */
    public function getUserOtpKey()
    {
        return $this->user_otpKey;
    }

    /**
     * @param mixed $user_otpKey
     */
    public function setUserOtpKey($user_otpKey)
    {
        $this->user_otpKey = $user_otpKey;
    }



}