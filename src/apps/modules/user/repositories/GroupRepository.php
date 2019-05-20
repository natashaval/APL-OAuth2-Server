<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 11:26
 */

namespace App\User\Repositories;


use Domain\User\Entities\GroupEntity;
use Domain\User\Repositories\GroupRepositoryInterface;
use Phalcon\Db\Column;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $groups = $conn->fetchAll("SELECT * FROM groups WHERE enabled = TRUE");
        return $groups;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $group = $conn->fetchOne("SELECT * FROM groups WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
        );
        return $group;
    }

    public function createGroup(GroupEntity $group)
    {
        // TODO: Implement createGroup() method.
        $conn = $this->getConnection();
        $newGroup = $conn->insert (
            "groups",
            [$group->getName()],
            ["name"]
        );
        return $newGroup;
    }

    public function updateGroup($id, GroupEntity $group)
    {
        // TODO: Implement updateGroup() method.
        $conn = $this->getConnection();
        $updateGroup = $conn->update(
            "groups",
            ["name"],
            [$group->getName()],
            [
                "conditions" => "id = ?",
                "bind" => [$id]
            ]
        );
        return $updateGroup;
    }

}