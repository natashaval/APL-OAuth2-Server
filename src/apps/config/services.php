<?php

use Phalcon\Logger\Adapter\File as Logger;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Http\Response\Cookies;
use Phalcon\Security;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;

use App\User\Repositories\UserRepository;
use App\User\Services\UserService;

$di['config'] = function() use ($config) {
	return $config;
};

$di['session'] = function() {
    $session = new Session();
	$session->start();

	return $session;
};

$di['dispatcher'] = function() use ($di, $defaultModule) {

    $eventsManager = $di->getShared('eventsManager');
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
};

$di['url'] = function() use ($config, $di) {
	$url = new \Phalcon\Mvc\Url();

    $url->setBaseUri($config->url['baseUrl']);

	return $url;
};

$di['userService'] = function () use ($config, $di) {
    $repository = new UserRepository($di);
    return new UserService($repository);
};

$di['voltService'] = function($view, $di) use ($config) { // menggunakan template volt seperti di Laravel -> blade
    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->application->cacheDir)) {
        mkdir($config->application->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->application->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di->set(
    'security',
    function () {
        $security = new Security();
        $security->setWorkFactor(12);

        return $security;
    },
    true
);

$di->set(
    'flash',
    function () {
        $flash = new FlashDirect(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        return $flash;
    }
);

$di->set(
    'flashSession',
    function () {
        $flash = new FlashSession(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        $flash->setAutoescape(false);
        
        return $flash;
    }
);

?>