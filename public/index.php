<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require_once './db/AccesoDatos.php';
require_once './controllers/MesaController.php';
require_once './controllers/UsuarioController.php';
require_once './controllers/ProductoController.php';
require_once './controllers/PedidoController.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$app = AppFactory::create();
$app ->addBodyParsingMiddleware();
$errorMW = $app->addErrorMiddleware(true, true, true);

//Peticiones
$app->group('/usuarios', function (RouteCollectorProxy $group) {
    $group->get('[/]', \UsuarioController::class . ':TraerTodos');
    $group->get('/{id_user}', \UsuarioController::class . ':TraerUno');
    $group->post('[/]', \UsuarioController::class . ':CargarUno');
    $group->put('[/]', \UsuarioController::class . ':ModificarUno');
    $group->delete('[/]', \UsuarioController::class . ':BorrarUno');
  });

$app->group('/mesas', function (RouteCollectorProxy $group){
    $group->get('[/]', \MesaController::class . ':TraerTodos');
    $group->get('/{numero}', \MesaController::class . ':TraerUno');
    $group->post('[/]', \MesaController::class . ':CargarUno');
    $group->put('[/]', \MesaController::class . ':ModificarUno');
    $group->delete('[/]', \MesaController::class . ':BorrarUno');
  });

$app->group('/productos', function (RouteCollectorProxy $group){
    $group->get('[/]', \ProductoController::class . ':TraerTodos');
    $group->get('/{id_produc}', \ProductoController::class . ':TraerUno');
    $group->post('[/]', \ProductoController::class . ':CargarUno');
    $group->put('[/]', \ProductoController::class . ':ModificarUno');
    $group->delete('[/]', \ProductoController::class . ':BorrarUno');
  });

$app->group('/pedidos', function (RouteCollectorProxy $group){
    $group->get('[/]', \PedidoController::class . ':TraerTodos');
    $group->get('/{codigo}', \PedidoController::class . ':TraerUno');
    $group->post('[/]', \PedidoController::class . ':CargarUno');
    $group->put('[/]', \PedidoController::class . ':ModificarUno');
    $group->delete('[/]', \PedidoController::class . ':BorrarUno');
  });

$app->run();
