<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 23:30
 */

namespace App\Exam\Controllers\Api;


use App\Exam\Presenters\SubjectPresenter;
use Domain\Exam\Entities\SubjectEntity;

class SubjectController extends BaseController
{
    private $subjectService;

    public function initialize(){
        $this->subjectService = $this->di->get('subjectService');
    }

    public function indexAction(){
        if($this->request->isGet()){
            $subjects = $this->subjectService->getAll();
            var_dump($subjects);
            return $this->sendObject(200, json_encode($subjects));
        }

        elseif ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newSubject = SubjectPresenter::convertCreate($data, new SubjectEntity());
            $result = $this->subjectService->createSubject($newSubject);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Subject has been created!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id) {
        if ($this->request->isGet()) {
            $subject = $this->subjectService->getById($id);
            if ($subject) return $this->sendObject(200, json_encode($subject));
            else return $this->sendJson(404, array("status" => "failed", "message" => "Subject not found!"));
        }
        elseif ($this->request->isPut()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $updateSubject = SubjectPresenter::convertCreate($data, new SubjectEntity());
            $result = $this->subjectService->updateSubject($id, $updateSubject);
            if ($result) return $this->sendJson(200, array('status' => 'success', 'message' => 'Subject has been updated!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to update subject!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }
}