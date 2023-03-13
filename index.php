<?php

require_once 'vendor/autoload.php';
use Miniframework\App;
use Miniframework\Controller\HomeController;
$app = new App();

$container = $app->getContainer();
$container['errorHandler'] = function () {
     return function ($responce)
     {
        return $responce->setBody("Page not found")->setStatusCode(404);
     };
};
$container['config'] = function ()
{
  return [
      'db_driver' => 'mysql',
      'db_host' => 'localhost',
      'db_name' => 'mini_framework',
      'db_user' => 'root',
      'db_pass' => 'Qtunisalive_1'
  ];
};

$container['db'] = function ($c) {
  return new PDO(
      $c->config['db_driver'].':host='. $c->config['db_host'].';dbname='. $c->config['db_name'],
      $c->config['db_user'],
      $c->config['db_pass']);
};

$app->get('/', [HomeController::class,"index"]);
$app->get('/user', [new \Miniframework\Controller\UserController($container->db), "index"]);
$app->run();