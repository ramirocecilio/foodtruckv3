<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';


$app = AppFactory::create();
$app->setBasePath('/foodtruckv3/api');
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

$app->get('/users', function (Request $request, Response $response, array $args) {
    $users = Capsule::table('tarjeta')->get();
    $response->getBody()->write(print_r($users, true));
    return $response;
});

$app->run();