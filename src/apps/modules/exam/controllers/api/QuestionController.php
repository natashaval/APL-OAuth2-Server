<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 14:42
 */

namespace App\Exam\Controllers\Api;


use App\Exam\Presenters\QuestionPresenter;
use Domain\Exam\Entities\QuestionEntity;

class QuestionController extends BaseController
{
    private $questionService;

    public function initialize(){
        $this->questionService = $this->di->get('questionService');
    }

    public function indexAction(){
        if($this->request->isGet()){
            $questions = $this->questionService->getAll();
            return $this->sendJson(200, $questions);
        }
        elseif ($this->request->isPost()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newQuestion = QuestionPresenter::convertCreate($data, new QuestionEntity());
            $result = $this->questionService->createQuestion($newQuestion);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Question has been created!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to create question!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id){
        if($this->request->isGet()){
            $question = $this->questionService->getById($id);
            if ($question) return $this->sendObject(200, json_encode($question));
            else return $this->sendJson(404, array("status" => "failed", "message" => "Subject not found!"));
        }
    }
}