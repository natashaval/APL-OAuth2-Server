<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 23:30
 */

namespace App\Exam\Controllers\Web;


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
            return $this->sendObject(json_encode($subjects));
        }
    }

    public function idAction($id) {
        if ($this->request->isGet()) {
//            return $this->sendJson(array("status" => "success"));
            $subject = $this->subjectService->getById($id);
//            return $subject;
            return $this->sendObject(json_encode($subject));
//            $dump = "var_dump(" + $subject + ");";
//            return $dump;
//            return json_encode($subject);
//            var_dump($subject);

        }
    }
}