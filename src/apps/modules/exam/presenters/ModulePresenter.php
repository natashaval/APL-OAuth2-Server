<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:40
 */

namespace App\Exam\Presenters;

use \Domain\Exam\Entities\ModuleEntity;

class ModulePresenter
{
    public static function convertCreate($data, ModuleEntity $entity){
        $entity->setName($data["name"]);
        return $entity;
    }
}