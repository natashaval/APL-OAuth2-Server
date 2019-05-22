<?php

namespace App\User;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'App\User\Controllers' => __DIR__ . '/controllers',
            'App\User\Repositories' => __DIR__ . '/repositories',
            'App\User\Models' => __DIR__ . '/models',
            'App\User\Services' => __DIR__ . '/services',
            'App\User\Presenters' => __DIR__ . '/presenters',
            'App\User\Factories' => __DIR__ . '/factories',
            'App\User\Libraries' => __DIR__ . '/libraries'

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