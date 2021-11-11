<?php
require_once './models/Producto.php';
require_once './interfaces/IApiUsable.php';

class ProductoController extends Producto implements IApiUsable
{
    public function CargarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $id_produc = $parametros['id_produc'];
        $nombre = $parametros['nombre'];
        $precio = $parametros['precio'];
        $stock = $parametros['stock'];
        $tipo = $parametros['tipo'];
        $perfilEmpleado = $parametros['perfilEmpleado'];

        // Creamos el Producto
        $produc = new Producto();
        $produc->id_produc = $id_produc;
        $produc->nombre = $nombre;
        $produc->precio = $precio;
        $produc->stock = $stock;
        $produc->tipo = $tipo;
        $produc->perfilEmpleado = $perfilEmpleado;
        $produc->crearProducto();

        $payload = json_encode(array("mensaje" => "Producto creado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerUno($request, $response, $args)
    {
        // Buscamos Producto por id
        $produc = $args['id_produc'];
        $producto = Producto::obtenerProducto($produc);
        $payload = json_encode($producto);

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerTodos($request, $response, $args)
    {
        $lista = Producto::obtenerTodos();
        $payload = json_encode(array("listaProducto" => $lista));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
    
    public function ModificarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $productoId = $parametros['id_produc'];
        Producto::modificarProducto($productoId);

        $payload = json_encode(array("mensaje" => "Producto modificado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function BorrarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $productoId = $parametros['id_produc'];
        Producto::borrarProducto($productoId);

        $payload = json_encode(array("mensaje" => "Producto borrado con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
}