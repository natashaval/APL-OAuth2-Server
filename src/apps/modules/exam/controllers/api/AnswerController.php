<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 16:07
 */

namespace App\Exam\Controllers\Api;


use App\Exam\Presenters\AnswerPresenter;
use Domain\Exam\Entities\AnswerEntity;

class AnswerController extends BaseController
{
    private $answerService;

    public function initialize(){
        $this->answerService = $this->di->get('answerService');
    }

    public function indexAction(){
        if($this->request->isGet()){
            $answers = $this->answerService->getAll();
            return $this->sendJson(200, $answers);
        }
        elseif ($this->request->isPost()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newAnswer = AnswerPresenter::convertCreate($data, new AnswerEntity());
            $result = $this->answerService->createAnswer($newAnswer);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Answer has been added!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to add answer!'));
//            var_dump($newAnswer);
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id){
        if($this->request->isGet()){
            $answer = $this->answerService->getById($id);
            if ($answer) return $this->sendObject(200, json_encode($answer));
            else return $this->sendJson(404, array("status" => "failed", "message" => "Answer not found!"));
        }

        elseif ($this->request->isDelete()){
            $result = $this->answerService->deleteById($id);
            if (!$result) return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to delete answer!'));
            else return $this->sendJson(200, array('status' => 'success', 'message' => 'Answer has been deleted!'));
        }
        elseif ($this->request->isPut()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $updateAnswer = AnswerPresenter::convertCreate($data, new AnswerEntity());
            $result = $this->answerService->updateAnswer($id, $updateAnswer);
            if ($result) return $this->sendJson(200, array('status' => 'success', 'message' => 'Answer has been updated!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to update answer!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }
}