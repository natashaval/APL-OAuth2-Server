<?php

use Phalcon\Config;

return new Config(
    [
        'mode' => 'DEVELOPMENT', //DEVELOPMENT, PRODUCTION, DEMO

        'database' => [
            'adapter' => 'Mysql',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname' => 'aplexam',
            'charset' => 'utf8',
        ],

        'url' => [
            'baseUrl' => 'http://exam.local/',
        ],

        'application' => [
            'libraryDir' => APP_PATH . "/lib/",
            'cacheDir' => APP_PATH . "/cache/",
        ],

        'version' => '0.1',
    ]
);
