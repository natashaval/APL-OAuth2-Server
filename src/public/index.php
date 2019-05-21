<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('memory_limit', '64M');
    header('Content-Type: text/html; charset=utf-8');
    mb_internal_encoding('UTF-8');
    
    setlocale(LC_TIME, 'id-ID');
    
    define('BASE_PATH', dirname(__DIR__));
    define('APP_PATH', BASE_PATH . '/apps');
    define('DOMAIN_PATH', BASE_PATH . '/domain');
    
    date_default_timezone_set('Asia/Jakarta');
    
    require __DIR__ . '/../vendor/autoload.php';
    
    require_once APP_PATH . '/Bootstrap.php';
    
    $app = new Bootstrap('user'); # menyambungkan dengan Phalcon

    // add CORS
//    $origin = $app->request->getHeader("ORIGIN") ? $app->request->getHeader("ORIGIN") : '*';
//    $app->response->setHeader("Access-Control-Allow-Origin", $origin)
//        ->setHeader("Access-Control-Allow-Methods", 'GET,PUT,POST,DELETE,OPTIONS')
//        ->setHeader("Access-Control-Allow-Headers", 'Origin, X-Requested-With, Content-Range, Content-Disposition, Content-Type, Authorization')
//        ->setHeader("Access-Control-Allow-Credentials", true);
//
//    $app->response->sendHeaders();

    $app->init();

?>