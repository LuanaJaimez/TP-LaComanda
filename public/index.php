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
require_once './middlewares/AuthJWT.php';
require_once './middlewares/MWAccesos.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$app = AppFactory::create();
$app ->addBodyParsingMiddleware();
$errorMW = $app->addErrorMiddleware(true, true, true);

//Peticiones
$app->group('/usuarios', function (RouteCollectorProxy $group)
{
    $group->get('/traer', \UsuarioController::class . ':TraerTodos');
    $group->get('/obtenerUsuario/{idUser}', \UsuarioController::class . ':TraerUno');
    $group->post('/login', \UsuarioController::class . ':LogIn');
    $group->post('/alta', \UsuarioController::class . ':CargarUno')->add(MWAccesos::class . ':EsSocio');
    $group->put('/modificar', \UsuarioController::class . ':ModificarUno')->add(MWAccesos::class . ':EsSocio');
    $group->delete('/borrar', \UsuarioController::class . ':BorrarUno')->add(MWAccesos::class . ':EsSocio');
  });

$app->group('/mesas', function (RouteCollectorProxy $group)
{
    $group->get('/traer', \MesaController::class . ':TraerTodos');
    $group->get('/{numero}', \MesaController::class . ':TraerUno');
    $group->post('/alta', \MesaController::class . ':CargarUno')->add(MWAccesos::class . ':EsSocio');
    $group->put('/actualizarMesa', \MesaController::class. ':ActualizarMesa')->add(MWAccesos::class. ':EsMozo');
    $group->put('/cerrarMesa', \MesaController::class. ':CerrarMesa')->add(MWAccesos::class. ':EsSocio');
    $group->put('/modificar', \MesaController::class . ':ModificarUno')->add(MWAccesos::class . ':EsSocio');
    $group->delete('/borrar', \MesaController::class . ':BorrarUno')->add(MWAccesos::class . ':EsSocio');
  });

$app->group('/productos', function (RouteCollectorProxy $group)
{
    $group->get('/traer', \ProductoController::class . ':TraerTodos');
    $group->get('/{idProduc}', \ProductoController::class . ':TraerUno');
    $group->post('/alta', \ProductoController::class . ':CargarUno')->add(MWAccesos::class . ':EsSocio');
    $group->put('/modificar', \ProductoController::class . ':ModificarUno')->add(MWAccesos::class . ':EsSocio');
    $group->delete('/borrar', \ProductoController::class . ':BorrarUno')->add(MWAccesos::class . ':EsSocio');
  });

$app->group('/pedidos', function (RouteCollectorProxy $group)
{    
    $group->get('/traer', \PedidoController::class . ':TraerTodos');
    $group->get('/{codigo}', \PedidoController::class . ':TraerUno');
    $group->post('/pendientes', \PedidoController::class . ':TraerPedidoPendiente');
    $group->post('/alta', \PedidoController::class . ':CargarUno')->add(MWAccesos::class . ':EsMozoYSocio');
    $group->put('/modificar', \PedidoController::class . ':ModificarUno')->add(MWAccesos::class . ':EsSocio');
    $group->delete('/borrar', \PedidoController::class . ':BorrarUno')->add(MWAccesos::class . ':EsSocio');
  });

$app->run();
