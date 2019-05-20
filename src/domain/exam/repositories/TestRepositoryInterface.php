<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:02
 */

namespace Domain\Exam\Repositories;


use Domain\Exam\Entities\TestEntity;

interface TestRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createTest(TestEntity $test);
    public function assignTestToGroups($test_id, $groups);
    public function assignTestToSubjects($test_id, $subjects);
}