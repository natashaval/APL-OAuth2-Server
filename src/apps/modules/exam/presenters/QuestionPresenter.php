<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 14:57
 */

namespace App\Exam\Presenters;


use Domain\Exam\Entities\QuestionEntity;

class QuestionPresenter
{
    public static function convertCreate($data, QuestionEntity $entity){
        $entity->setDescription($data["description"]);
        if(isset($data["explanation"])) $entity->setDescription($data["explanation"]);
        $entity->setType($data["type"]);
        $entity->setDifficulty($data["difficulty"]);
        $entity->setPosition($data["position"]);
        $entity->setTimer($data["timer"]);
        $entity->setSubject($data["subject_id"]);
        return $entity;
    }
}