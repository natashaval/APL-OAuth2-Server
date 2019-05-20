<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/20/2019
 * Time: 11:38
 */

namespace App\User\Controllers\Api;


use App\User\Presenters\GroupPresenter;
use Domain\User\Entities\GroupEntity;

class GroupController extends BaseController
{
    private $groupService;

    public function initialize() {
        $this->groupService = $this->di->get('groupService');
    }

    public function indexAction(){
        if($this->request->isGet()){
            $data = $this->groupService->getAll();
            return $this->sendJson(200, $data);
        }
        elseif ($this->request->isPost()) {
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $newGroup = GroupPresenter::convertCreate($data, new GroupEntity());
            $result = $this->groupService->createGroup($newGroup);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'Group has been created!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to create group!'));
        }
        else {
            return $this->sendJson(400, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id){
        if($this->request->isGet()){
            $group = $this->groupService->getById($id);
            if (!$group) {
                return $this->sendJson(404, array('status' => 'Not Found', 'message' => 'Group is not found!'));
            } else {
                return $this->sendJson(200, $group);
            }
        }
        elseif ($this->request->isPut()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);
            $updateGroup = GroupPresenter::convertCreate($data, new GroupEntity());
            $result = $this->groupService->updateGroup($id, $updateGroup);
            if ($result) return $this->sendJson(200, array('status' => 'success', 'message' => 'Group has been updated!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to update group!'));
        }
        else {
            return $this->sendJson(400, array("status" => "failed", "message" => "No mapping found!"));
        }
    }
}