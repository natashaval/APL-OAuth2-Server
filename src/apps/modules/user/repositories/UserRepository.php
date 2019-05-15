<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:29
 */

namespace App\User\Repositories;

use Domain\User\Entities\UserEntity;
use Domain\User\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $users = $this->db->fetchAll("SELECT * FROM users", \Phalcon\Db::FETCH_ASSOC);
        return $users;

    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $user = $this->db->fetchOne("SELECT * FROM users WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [
                "id" => $id
            ]
            );
        return $user;
    }

    public function createUser(UserEntity $user)
    {
        // TODO: Implement createUser() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteUser() method.
    }

    public function updateById($id, UserEntity $user)
    {
        // TODO: Implement updateUser() method.
    }
}