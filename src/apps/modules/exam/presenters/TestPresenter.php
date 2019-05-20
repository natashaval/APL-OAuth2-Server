<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:37
 */

namespace App\Exam\Presenters;


use App\Exam\Models\TestRequest;
use App\Exam\Models\TestResponse;
use Domain\Exam\Entities\TestEntity;

class TestPresenter
{
    public static function convertCreate($data, TestEntity $entity){
        $entity->setName($data["name"]);
        if(isset($data["description"])) $entity->setDescription($data["description"]);
        if(isset($data["begin_time"])) $entity->setBeginTime($data["begin_time"]);
        if(isset($data["end_time"])) $entity->setEndTime($data["end_time"]);
        $entity->setDurationTime($data["duration_time"]);

        if(isset($data["result_to_user"])) $entity->setResultToUser($data["result_to_user"]);
        if(isset($data["report_to_user"])) $entity->setReportToUser($data["report_to_user"]);

        if(isset($data["score_right"])) $entity->setScoreRight($data["score_right"]);
        if(isset($data["score_wrong"])) $entity->setScoreWrong($data["score_wrong"]);
        if(isset($data["score_unanswered"])) $entity->setScoreUnanswered($data["score_unanswered"]);
        if(isset($data["score_max"])) $entity->setScoreMax($data["score_max"]);
        if(isset($data["score_threshold"])) $entity->setScoreThreshold($data["score_threshold"]);

        if(isset($data["password"])) $entity->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));
        return $entity;
    }

    public static function convertGet($data, TestResponse $response){
        $response->id = $data["id"];
        $response->name = $data["name"];
        $response->begin_time = $data["begin_time"];
        $response->end_time = $data["end_time"];
        return $response;
    }

    public static function convertAssign($data, TestRequest $request){
        $request->test_id = $data["test_id"];
        $request->groups = $data["groups"];
        $request->subjects = $data["subjects"];
        return $request;
    }
}