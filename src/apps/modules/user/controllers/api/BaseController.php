<?php
/**
 * Created by IntelliJ IDEA.
 * User: Natasha
 * Date: 5/16/2019
 * Time: 00:26
 */

namespace App\User\Controllers\Api;

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

// https://forum.phalconphp.com/discussion/22/the-best-way-for-json-response-
// comment by jirkadajc

abstract class BaseController extends Controller
{
    public function sendJson($code, $data) {
        $this->view->disable();
        $response = new Response();
        $response->setHeader("Access-Control-Allow-Origin", "*");
        $response->setStatusCode($code);
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response;
    }
}