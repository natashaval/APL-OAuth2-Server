<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 11:32
 */

namespace Domain\User\Services;


use Domain\User\Entities\GroupEntity;
use Domain\User\Repositories\GroupRepositoryInterface;

class GroupService
{
    private $groupRepository;

    /**
     * GroupService constructor.
     * @param $groupRepository
     */
    public function __construct(GroupRepositoryInterface $repository)
    {
        $this->groupRepository = $repository;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $group = $this->groupRepository->getById($id);
        return $group;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        $groups = $this->groupRepository->getAll();
        return $groups;
    }

    public function createGroup(GroupEntity $group)
    {
        // TODO: Implement createGroup() method.
        $newGroup = $this->groupRepository->createGroup($group);
        return $newGroup;
    }

    public function updateGroup($id, GroupEntity $group) {
        $exist = $this->getById($id);
        if (!$exist) return false;
        else {
            $updateGroup = $this->groupRepository->updateGroup($id, $group);
            return $updateGroup;
        }
    }
}