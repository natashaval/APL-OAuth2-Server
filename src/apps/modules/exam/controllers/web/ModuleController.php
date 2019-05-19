<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:14
 */

namespace App\Exam\Controllers\Web;

use App\Exam\Presenters\ModulePresenter;
use Domain\Exam\Entities\ModuleEntity;

class ModuleController extends BaseController
{
    private $moduleService;

    public function initialize(){
        $this->moduleService = $this->di->get('moduleService');
    }

    public function indexAction(){
        if($this->request->isGet()) {
            $modules = $this->moduleService->getAll();
            var_dump($modules);
//            return $this->sendJson($modules);
        }
        else if ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newModule = ModulePresenter::convertCreateModule($data, new ModuleEntity());
            $result = $this->moduleService->createModule($newModule);
            if ($result) return $this->sendJson(array('status' => 'success', 'message' => 'Module has been created!'));
        }

        else {
            $this->response->setStatusCode(400);
            $this->response->setJsonContent(array("status" => "failed", "message" => "No mapping found!"));
            return $this->response;
        }
    }

    public function idAction($id){
        if($this->request->isGet()){
            $module = $this->moduleService->getById($id);
            if (!$module) {
                $this->response->setStatusCode(404);
                $this->response->setJsonContent(
                    array('status' => 'failed', 'message' => 'Module is not found!'));
                return $this->response;
            } else {
                return $this->sendJson($module);
            }
        }
        else if ($this->request->isDelete()){
            $result = $this->moduleService->deleteById($id);
            if ($result) return $this->sendJson(array('status' => 'success', 'message' => 'Module has been deleted!'));
            else {
                $this->response->setStatusCode(404);
                $this->response->setJsonContent(array('status' => 'failed', 'message' => 'Module to be deleted is not found!'));
                return $this->response;
            }
        }
    }

}