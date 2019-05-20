<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 21:36
 */

namespace App\Exam\Controllers\Api;


use App\Exam\Models\TestRequest;
use App\Exam\Models\TestResponse;
use App\Exam\Presenters\TestPresenter;
use Domain\Exam\Entities\TestEntity;

class TestController extends BaseController
{
    private $testService;

    public function initialize(){
        $this->testService = $this->di->get('testService');
    }

    public function indexAction(){
        if($this->request->isGet()){
            $tests = $this->testService->getAll();
//            var_dump($subjects);
            return $this->sendObject(200, json_encode($tests));
        }

        elseif ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newTest = TestPresenter::convertCreate($data, new TestEntity());
//            var_dump($newTest);
            $result = $this->testService->createTest($newTest);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Test has been created!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to create test!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id) {
        if ($this->request->isGet()) {
            $test = $this->testService->getById($id);
//            if ($test) return $this->sendObject(200, json_encode($test));
            $response = TestPresenter::convertGet($test, new TestResponse());
//            var_dump($response);
            if ($response) return $this->sendObject(200, json_encode($response));
            else return $this->sendJson(404, array("status" => "failed", "message" => "Test not found!"));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function listAction(){
        $testsResponse = [];
        $tests = $this->testService->getAll();
        foreach ($tests as $test){
            $response = TestPresenter::convertGet($test, new TestResponse());
            array_push($testsResponse, $response);
        }
//        var_dump($testsResponse);
        return $this->sendJson(200, $testsResponse);
    }

    public function assignAction(){
        if ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(), true);
            $request = TestPresenter::convertAssign($data, new TestRequest());
            $message = [];
            if(count($request->subjects) > 0) {
                $this->testService->assignTestToSubjects($request->test_id, $request->subjects);
                array_push($message, "Subjects has been assigned to test");
            }
            if(count($request->groups) > 0) {
                $this->testService->assignTestToGroups($request->test_id, $request->groups);
                array_push($message, "Groups has been assigned to test");
            }
            return $this->sendJson(200, $message);
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }
}