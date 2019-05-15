<?php

return array(
 
    'oauth' => [
        'namespace' => 'App\Oauth',
        'webControllerNamespace' => 'App\Oauth\Controllers\Web',
        'apiControllerNamespace' => 'App\Oauth\Controllers\Api',
        'className' => 'App\Oauth\Module',
        'path' => APP_PATH . '/modules/oauth/Module.php',
        'defaultRouting' => true, // menentukan apakah menggunakan format url path atau tidak
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],

    'user' => [
        'namespace' => 'App\User',
        'webControllerNamespace' => 'App\User\Controllers\Web',
        'apiControllerNamespace' => 'App\User\Controllers\Api',
        'className' => 'App\User\Module',
        'path' => APP_PATH . '/modules/User/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ]
);

?>