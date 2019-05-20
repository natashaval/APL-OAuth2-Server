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
        $users = $conn->fetchAll("SELECT * FROM users WHERE enabled = TRUE", \Phalcon\Db::FETCH_ASSOC);
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
            [ // value
                $user->getName(),
                $user->getPassword(),
                $user->getEmail(),
                $user->getRegDate(),
                $user->getRegNumber(),
                $user->getOtpkey()
            ],
            ["name", "password", "email", "registration_date","registration_number","otpkey"] // field
        );

        $userId = $conn->lastInsertId();
        $groups = $user->getGroups();
        if (count($groups) > 0) {
            foreach ($groups as $group) {
                // group_id insert into N-N users_groups
                $groupId = $conn->insert(
                    "users_groups",
                    [$userId, $group],
                    ["user_id", "group_id"]
                );
            }
        }

        return $newUser;
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteUser() method.
        $conn = $this->getConnection();
        $stmt = $conn->prepare(
            "UPDATE `users` SET enabled=FALSE WHERE id= :id"
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

}