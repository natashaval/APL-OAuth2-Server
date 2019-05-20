<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 16:18
 */

namespace App\Exam\Presenters;


use Domain\Exam\Entities\AnswerEntity;

class AnswerPresenter
{
    public static function convertCreate($data, AnswerEntity $entity) {
        $entity->setDescription($data["description"]);
        if(isset($data["explanation"])) $entity->setExplanation($data["explanation"]);
        $entity->setIsRight($data["is_right"]);
        $entity->setPosition($data["position"]);
        $entity->setQuestion($data["question_id"]);
        return $entity;
    }
}