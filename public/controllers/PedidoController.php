<?php
require_once './models/Pedido.php';
require_once './models/Producto.php';
require_once './models/Mesa.php';
require_once './MesaController.php';
require_once './interfaces/IApiUsable.php';

class PedidoController extends Pedido implements IApiUsable
{
    public function CargarUno($request, $response, $args)
    {
      $parametros = $request->getParsedBody();

      $idMesa = $parametros['idMesa'];
      $idUser = $parametros['idUser'];
      $datosProducto = $parametros['datosProducto'];
      $cantidad = $parametros['cantidad'];
      $foto = $_FILES['foto'];
      $codigo = Pedido::CrearCodigo();
      $fecha = new datetime("now");
      $estado = "Pendiente";
     
      //Pedido
      $pd = new Pedido();
      $pd->codigo = $codigo;
      $pd->idMesa = $idMesa;
      $pd->idUser = $idUser;
      $pd->tiempo = 0;
      $pd->fecha = $fecha->format('Y-m-d');
      $pd->estado = $estado;
      if($estado == "Pendiente" || $estado == "En preparacion" || $estado == "Listo para servir")
      {
        $eMesa = "Esperando";
        $e = Mesa::ActualizarMesa($eMesa, $idMesa);
      }
      $pd->cantidad = $cantidad;
      $pd->datosProducto = $datosProducto;
      if($foto['size']>0)
      {
        $img = $pd->GuardarFoto($_FILES['foto']);
      }
      else
      {
        $img = "La foto no existe";
      }

      //Producto
      if(Pedido::ValidarProducto($datosProducto))
      {
        $pd->datosProducto = $datosProducto;
        $pd->idUser = $idUser;
        $t = Producto::obtenerProducto($datosProducto);
        $pd->total = Pedido::Total($t);
      }

      //Creo el Pedido
      $creacion = $pd->crearPedido();

      if($creacion > 0)
      {
        $c = "Codigo: ". $pd->codigo;

        $payload = json_encode(array("mensaje" => "Pedido creado con exito". $c));
      }
      else
      {
        $payload = json_encode(array("mensaje" => "Error al crear el pedido"));
      }

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

    public function TraerPedidoPendiente($request, $response, $args)
    {
      $pedido = Pedido::obtenerPedidoPendiente();
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