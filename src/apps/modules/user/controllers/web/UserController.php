<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:31
 */

namespace App\User\Controllers\Web;


use Phalcon\Http\Response;


class UserController extends BaseController
{
    private $userService;

    public function initialize(){
        $this->userService = $this->di->get('userService');
    }

    public function helloAction()
    {
//        return $this->view->pick('dashboard/hello');
//        echo "USER HELLO ECHO!";
        $hasService = $this->di->has('userService');
        echo $hasService;
    }

    public function jsonAction(){
//        $this->view->disable();
//
//        $response = new Response();
//        $response->setContentType('application/json', 'UTF-8');
//        $response->setJsonContent(array('status' => 'success', 'message' => 'coba dari usercontroller JSON'));
//        return $response;

        $data = array('status' => 'success', 'message' => 'coba dari basecontroller');
        return $this->sendJson($data);
    }

    public function getAllAction() {
        $data = $this->userService->getAll();
        return $this->sendJson($data);
    }

    public function getByIdAction($id) {
        $data = $this->userService->getById($id);
        return $this->sendJson($data);
    }


}