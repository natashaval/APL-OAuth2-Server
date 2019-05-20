<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 11:42
 */

namespace App\User\Presenters;


use Domain\User\Entities\GroupEntity;

class GroupPresenter
{
    public static function convertCreate($data, GroupEntity $group){
        $group->setName($data["name"]);
        return $group;
    }
}