<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:31
 */

namespace App\User\Controllers\Api;


use App\User\Factories\UserFactory;
use App\User\Models\UserResponse;
use App\User\Presenters\UserPresenter;
use Domain\User\Entities\UserEntity;
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

    public function indexAction() {
        if ($this->request->isPost()){
            $this->view->disable();
            $data = json_decode($this->request->getRawBody(),true);

//            echo $data["name"];
//            return $this->sendJson($data);
//            $newUser = new UserEntity();
//            $newUser->setName($data["name"]);
//            $newUser->setPassword($data["password"]);
//            if (isset($data["otpkey"])) $newUser->setOtpkey($data["otpkey"]);


            $factoryUser = UserFactory::create();
            $newUser = UserPresenter::convertCreateUser($data, $factoryUser);

            $result = $this->userService->createUser($newUser);
            if ($result) return $this->sendJson(201, array('status' => 'success', 'message' => 'User has been created!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to create user!'));

        }

        else if ($this->request->isGet()) {
            $data = $this->userService->getAll();
            return $this->sendJson(200, $data);
        }
        else {
            return $this->sendJson(400, array("status" => "failed", "message" => "No mapping found!"));
        }
    }

    public function idAction($id)
    {
        if ($this->request->isGet()) {
            $user = $this->userService->getById($id);
            if (!$user) {
                return $this->sendJson(404, array('status' => 'Not Found', 'message' => 'User is not found!'));
            } else {
//                return $this->sendJson($user);
                $userResponse = UserPresenter::convertGetResponse($user, new UserResponse());
                return $this->sendJson(200, $userResponse);
            }
        } elseif ($this->request->isDelete()) {
            $result = $this->userService->deleteById($id);
            if ($result) return $this->sendJson(200, array('status' => 'success', 'message' => 'User has been deleted!'));
            else return $this->sendJson(400, array('status' => 'failed', 'message' => 'Failed to delete user!'));

        }
    }

        public function generateAction($id){
            if ($this->request->isGet()){
                $user = $this->userService->getById($id);
//                echo implode($user);
                $qrCode = $this->userService->generateQR(implode($user));
//                echo $qrCode;
                $this->view->setVar("qrCode", $qrCode);
                $this->view->pick('dashboard/qr');
            }
        }


}