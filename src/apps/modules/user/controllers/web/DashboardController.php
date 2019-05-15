<?php

namespace App\User\Controllers\Web;

use Phalcon\Mvc\Controller;

class DashboardController extends Controller // extend Default Controller from Phalcon
{
    public function indexAction()
    {
        return $this->view->pick('dashboard/index');
    }

    public function helloAction(){
        echo "Hello World!";
    }
}

?>