<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:20
 */

namespace Domain\User\Repositories;
use Domain\User\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createUser(UserEntity $user);
    public function deleteById($id);
}