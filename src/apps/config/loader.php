<?php

// digunakan ketika membutuhkan library dari luar

$loader = new \Phalcon\Loader();

/**
  * Load library namespace
  */
  $loader->registerNamespaces(array(
      'Domain\User\Repositories' => DOMAIN_PATH . '/user/repositories/',
      'Domain\User\Entities' => DOMAIN_PATH . '/user/entities/',
      'Domain\User\Services' => DOMAIN_PATH . '/user/services/',
      'Domain\User\Libraries' => DOMAIN_PATH . '/user/libraries/',

      'Domain\Exam\Entities' => DOMAIN_PATH . '/exam/entities',
      'Domain\Exam\Repositories' => DOMAIN_PATH . '/exam/repositories',
      'Domain\Exam\Services' => DOMAIN_PATH . '/exam/services',
      'Domain\Exam\Mappers' => DOMAIN_PATH . '/exam/mappers',


));

$loader->register();

?>