<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/19/2019
 * Time: 21:11
 */

namespace App\Exam\Controllers\Api;

use Phalcon\Http\Response;
use \Phalcon\Mvc\Controller;

class BaseController extends Controller
{
//https://forum.phalconphp.com/discussion/12725/cross-domain-access
    public function sendJson($code, $data) {
        $this->view->disable();
        $response = new Response();
        $response->setHeader("Access-Control-Allow-Origin", "*");
        $response->setStatusCode($code);
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response;
    }

    public function sendObject($code, $data) {
        $this->view->disable();
        $response = new Response();
        $response->setHeader("Access-Control-Allow-Origin", "*");
        $response->setStatusCode($code);
        $response->setContentType('application/json', 'UTF-8');
        $response->setContent($data);
        return $response;
    }
}