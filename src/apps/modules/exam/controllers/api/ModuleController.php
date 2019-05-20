<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:14
 */

namespace App\Exam\Controllers\Api;

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
//            var_dump($modules);
            return $this->sendJson(200, $modules);
        }
        else if ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newModule = ModulePresenter::convertCreate($data, new ModuleEntity());
            $result = $this->moduleService->createModule($newModule);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Module has been created!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id){
        if($this->request->isGet()){
            $module = $this->moduleService->getById($id);
            if (!$module) {
                return $this->sendJson(404, array('status' => 'failed', 'message' => 'Module is not found!'));
            } else {
                return $this->sendJson(200, $module);
            }
        }
        else if ($this->request->isDelete()){
            $result = $this->moduleService->deleteById($id);
            if (!$result) return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to delete module!'));
            else return $this->sendJson(200, array('status' => 'success', 'message' => 'Module has been deleted!'));
        }
        else {
            return $this->sendJson(405, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

}