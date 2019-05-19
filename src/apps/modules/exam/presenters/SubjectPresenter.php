<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 00:52
 */

namespace App\Exam\Presenters;


use Domain\Exam\Entities\SubjectEntity;

class SubjectPresenter
{
    public static function convertCreate($data, SubjectEntity $entity){
        $entity->setName($data["name"]);
        if(isset($data["description"])) $entity->setDescription($data["description"]);
        $entity->setModule($data["module_id"]);
        return $entity;
    }

}