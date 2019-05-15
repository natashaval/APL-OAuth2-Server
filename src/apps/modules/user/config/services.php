<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;

//use App\User\Repositories\UserRepository;
//use App\User\Services\UserService;

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};
//
//$di['userService'] = function () use ($config, $di) {
//    $repository = new UserRepository($di);
//    return new UserService($repository);
//}

?>