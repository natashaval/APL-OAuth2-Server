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
use Domain\User\Services\UserService;

use App\Exam\Repositories\ModuleRepository;
use Domain\Exam\Services\ModuleService;
use App\Exam\Repositories\SubjectRepository;
use Domain\Exam\Services\SubjectService;
use App\Exam\Repositories\QuestionRepository;
use Domain\Exam\Services\QuestionService;
use App\Exam\Repositories\AnswerRepository;
use Domain\Exam\Services\AnswerService;
use App\Exam\Repositories\TestRepository;
use Domain\Exam\Services\TestService;

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

$di->setShared('database', function() use ($config) {
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ];

    $connection = new $class($params);
    return $connection;
});

$di['groupService'] = function () use ($di) {
    $repository = new \App\User\Repositories\GroupRepository($di);
    return new \Domain\User\Services\GroupService($repository);
};

$di['userService'] = function () use ($di) {
    $repository = new UserRepository($di);
    return new UserService($repository);
};

$di['moduleService'] = function () use ($di) {
    $repository  =new ModuleRepository($di);
    return new ModuleService($repository);
};

$di['subjectService'] = function () use ($di) {
    $subjectRepository = new SubjectRepository($di);
    $moduleRepository = new ModuleRepository($di);
    return new SubjectService($subjectRepository, $moduleRepository);
};

$di['questionService'] = function () use ($di) {
  $questionRepository = new QuestionRepository($di);
  $subjectRepository = new SubjectRepository($di);
  return new QuestionService($questionRepository, $subjectRepository);
};

$di['answerService'] = function () use ($di) {
    $answerRepository = new AnswerRepository($di);
    $questionRepository = new QuestionRepository($di);
    return new AnswerService($answerRepository, $questionRepository);
};

$di['testService'] = function () use ($di) {
    $repository = new TestRepository($di);
    return new TestService($repository);
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