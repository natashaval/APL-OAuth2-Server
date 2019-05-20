<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:33
 */

namespace Domain\Exam\Services;


use Domain\Exam\Entities\TestEntity;
use Domain\Exam\Repositories\TestRepositoryInterface;

class TestService
{
    private $testRepository;

    /**
     * TestService constructor.
     * @param $testRepository
     */
    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function getAll(){
        $tests = $this->testRepository->getAll();
        return $tests;
    }
    public function getById($id){
        $test = $this->testRepository->getById($id);
        return $test;
    }
    public function createTest(TestEntity $test){
        $newTest = $this->testRepository->createTest($test);
        return $newTest;
    }
    public function assignTestToGroups($test_id, $groups){
        $assign = $this->testRepository->assignTestToGroups($test_id, $groups);
        return $assign;
    }
    public function assignTestToSubjects($test_id, $subjects){
        $assign = $this->testRepository->assignTestToSubjects($test_id, $subjects);
        return $assign;
    }
}