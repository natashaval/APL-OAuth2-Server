<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/15/2019
 * Time: 21:31
 */

namespace App\User\Controllers\Web;

use Phalcon\Mvc\Controller;


class UserController extends Controller
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


}