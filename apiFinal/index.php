<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/apiFinal");

require __DIR__. '/dbconnect.php';
require __DIR__. '/api/member.php';
require __DIR__. '/api/selectsearch.php';
require __DIR__. '/api/picturefield.php';
$app->run();