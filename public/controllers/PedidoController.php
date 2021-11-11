<?php
require_once './models/Pedido.php';
require_once './interfaces/IApiUsable.php';

class PedidoController extends Pedido implements IApiUsable
{
    public function CargarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $codigo = $parametros['codigo'];
        $id_mesa = $parametros['id_mesa'];
        $datos_producto = $parametros['datos_producto'];
        $id_user = $parametros['id_user'];
        $estado = $parametros['estado'];
        $total = $parametros['total'];

        // Creamos el Pedido
        $pd = new Pedido();
        $pd->codigo = $codigo;
        $pd->id_mesa = $id_mesa;
        $pd->datos_producto = $datos_producto;
        $pd->id_user = $id_user;
        $pd->estado = $estado;
        $pd->total = $total;
        $pd->crearPedido();

        $payload = json_encode(array("mensaje" => "Pedido creado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerUno($request, $response, $args)
    {
        // Buscamos Pedido por id
        $pd = $args['codigo'];
        $pedido = Pedido::obtenerPedido($pd);
        $payload = json_encode($pedido);

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerTodos($request, $response, $args)
    {
        $lista = Pedido::obtenerTodos();
        $payload = json_encode(array("listaPedido" => $lista));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
    
    public function ModificarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $pedidoId = $parametros['codigo'];
        Pedido::modificarPedido($pedidoId);

        $payload = json_encode(array("mensaje" => "Pedido modificado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function BorrarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $pedidoId = $parametros['codigo'];
        Pedido::borrarPedido($pedidoId);

        $payload = json_encode(array("mensaje" => "Pedido borrado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
}