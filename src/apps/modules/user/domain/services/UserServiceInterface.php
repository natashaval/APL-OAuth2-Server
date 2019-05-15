<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:42
 */
namespace Domain\User\Services;


use Domain\User\Entities\UserEntity;

interface UserServiceInterface
{
    public function getAll();
    public function getById($id);
    public function createUser(UserEntity $user);
    public function deleteById($id);
}