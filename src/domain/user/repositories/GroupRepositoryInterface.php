<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 11:08
 */

namespace Domain\User\Repositories;


use Domain\User\Entities\GroupEntity;

interface GroupRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createGroup(GroupEntity $group);
    public function updateGroup($id, GroupEntity $group);
}