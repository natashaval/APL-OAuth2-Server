<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/18/2019
 * Time: 13:43
 */

/*
 * Clean code architecture in PHP page 87
 */

namespace App\User\Factories;

use Domain\User\Entities\UserEntity;

class UserFactory
{
    public static function create() {
        $user = new UserEntity();
        $user->setRegDate(date("Y-m-d"));
        return $user;
    }
}