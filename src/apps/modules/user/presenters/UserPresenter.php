<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/18/2019
 * Time: 13:36
 */

namespace App\User\Presenters;

use App\User\Models\User;
use App\User\Models\UserResponse;
use Domain\User\Entities\UserEntity;

class UserPresenter
{
    /*
     * Convert To XXX (from, to)
     */

    /*
    public function convertToEntity(UserEntity $entity, User $user) { // return class User in app/models
        $user->setUserId($entity->getId());
        $user->setUserName($entity->getName());
        $user->setUserPassword(password_hash($entity->getPassword(), PASSWORD_DEFAULT));
        $user->setUserRegistrationNumber($entity->getRegistrationNumber());
        $user->setUserUserLevel($entity->getUserLevel());
        $user->setUserOtpKey($entity->getOtpKey());
        return $user;
    }
    */

    public static function convertCreateUser($data, UserEntity $user) { // array data from
        $user->setName($data["name"]);
        $user->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));
        if (isset($data["email"])) $user->setEmail($data["email"]);
        if (isset($data["regNumber"])) $user->setRegNumber($data["regNumber"]);
        if (isset($data["regDate"])) $user->setRegDate($data["regDate"]);
        if (isset($data["otpKey"])) $user->setOtpKey($data["otpKey"]);
        if (isset($data["groups"])) $user->setGroups($data["groups"]); // array of group_id
        return $user;
    }

    public static function convertGetResponse($data, UserResponse $user) {
        $user->user_id = $data["id"];
        $user->user_name = $data["name"];
        $user->user_email = $data["email"];
        $user->user_regdate = $data["registration_date"];
        $user->user_level = $data["level"];
        $user->user_otpKey = $data["otpKey"];
        return $user;
    }

}