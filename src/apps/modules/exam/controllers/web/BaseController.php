<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:11
 */

namespace App\Exam\Controllers\Web;

use Phalcon\Http\Response;
use \Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public function sendJson($data) {
        $this->view->disable();
        $response = new Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response;
    }

    public function sendObject($data) {
        $this->view->disable();
        $response = new Response();
        $response->setStatusCode(200);
        $response->setContentType('application/json', 'UTF-8');
        $response->setContent($data);
        return $response;
    }
}