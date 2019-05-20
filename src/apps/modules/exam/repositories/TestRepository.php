<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:20
 */

namespace App\Exam\Repositories;


use Domain\Exam\Entities\TestEntity;
use Domain\Exam\Repositories\TestRepositoryInterface;
use Phalcon\Db\Column;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $conn = $this->getConnection();
        $tests = $conn->fetchAll("SELECT * FROM tests WHERE enabled = TRUE");
        return $tests;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $conn = $this->getConnection();
        $test = $conn->fetchOne("SELECT * FROM tests WHERE id = :id",
            \Phalcon\Db::FETCH_ASSOC,
            [ "id" => $id],
            [ "id" => Column::BIND_PARAM_INT]
        );
        return $test;
    }

    public function createTest(TestEntity $test)
    {
        // TODO: Implement createTest() method.
        $conn = $this->getConnection();
        $newTest = $conn->insert (
            "tests",
            [
                $test->getName(),
                $test->getDescription(),
                $test->getBeginTime(),
                $test->getEndTime(),
                $test->getDurationTime(),
                $test->getResultToUser(),
                $test->getReportToUser(),
                $test->getScoreRight(),
                $test->getScoreWrong(),
                $test->getScoreUnanswered(),
                $test->getScoreMax(),
                $test->getScoreThreshold(),
                $test->getPassword()
            ],
            ["name", "description", "begin_time", "end_time", "duration_time",
                "result_to_user", "report_to_user",
                "score_right", "score_wrong", "score_unanswered", "score_max",
                "score_threshold", "password"]
        );
        return $newTest; // get inserted Id of newly created test
    }

    public function assignTestToGroups($test_id, $groups)
    {
        // TODO: Implement assignTestToGroups() method.
        $conn = $this->getConnection();
        foreach ($groups as $group){
            $assign = $conn->insert(
                "tests_groups",
                [$test_id, $group],
                ["test_id", "group_id"]
            );
        }
        return true;
    }

    public function assignTestToSubjects($test_id, $subjects)
    {
        // TODO: Implement assignTestToSubjects() method.
        $conn = $this->getConnection();
        foreach ($subjects as $subject){
            $assign = $conn->insert(
                "tests_subjects",
                [$test_id, $subject],
                ["test_id", "subject_id"]
            );
        }
        return true;
    }
}