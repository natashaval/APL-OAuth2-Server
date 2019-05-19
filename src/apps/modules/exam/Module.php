<?php

namespace App\Exam;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'App\Exam\Controllers' => __DIR__ . '/controllers',
            'App\Exam\Repositories' => __DIR__ . '/repositories',
            'App\Exam\Models' => __DIR__ . '/models',
            'App\Exam\Services' => __DIR__ . '/services',
            'App\Exam\Presenters' => __DIR__ . '/presenters',
            'App\Exam\Factories' => __DIR__ . '/factories'

        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }
}