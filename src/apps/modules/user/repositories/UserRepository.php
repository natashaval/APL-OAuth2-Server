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
use App\User\Repositories\BaseRepository;
use Phalcon\Db\Column;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $users = $conn->fetchAll("SELECT * FROM users", \Phalcon\Db::FETCH_ASSOC);
        return $users;

    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $user = $conn->fetchOne("SELECT * FROM users WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [
                "id" => $id
            ]
            );
        if ($user != null) return $user;
        else return false;
    }

    public function createUser(UserEntity $user)
    {
        // TODO: Implement createUser() method.
        $conn = $this->getConnection();
        $newUser = $conn->insert(
            "users", // table
            [$user->getName(), $user->getPassword(), $user->getOtpkey()], // value
            ["name", "password", "otpkey"] // field
        );

        return $newUser;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteUser() method.
        $conn = $this->getConnection();
        $stmt = $conn->prepare(
            "DELETE FROM users WHERE id =:id"
        );

        $result = $conn->executePrepared($stmt,
            [
                "id" => $id
            ],
            [
                "id" => COLUMN::BIND_PARAM_INT
            ]);

        return true;

    }

    public function updateById($id, UserEntity $user)
    {
        // TODO: Implement updateUser() method.
    }
}