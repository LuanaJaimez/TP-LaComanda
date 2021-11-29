<?php
require_once './models/Mesa.php';
require_once './interfaces/IApiUsable.php';

class MesaController extends Mesa implements IApiUsable
{
    public function CargarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $idUser = $parametros['idUser'];
        $estadoMesa = "Esperando";

        // Creamos la mesa
        $mesa = new Mesa();
        $mesa->estadoMesa = $estadoMesa;
        if(Mesa::ValidarUser($idUser))
        {
          $mesa->idUser = $idUser;
          $mesa->crearMesa();
  
          $payload = json_encode(array("mensaje" => "Mesa creada con exito"));
          $mesa->Mostrar();
        }
        else
        {
          $payload = json_encode(array("mensaje" => "Error al crear la mesa"));
        }


        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerUno($request, $response, $args)
    {
        // Buscamos mesa por numero
        $mesa = $args['numero'];
        $unaMesa = Mesa::obtenerMesa($mesa);
        $payload = json_encode($unaMesa);

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function TraerTodos($request, $response, $args)
    {
        $lista = Mesa::obtenerTodos();
        $payload = json_encode(array("listaMesa" => $lista));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
    
    public function ModificarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $numero = $parametros['numero'];
        Mesa::modificarMesa($numero);

        $payload = json_encode(array("mensaje" => "Mesa modificada con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function BorrarUno($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $mesaId = $parametros['numero'];
        Mesa::borrarMesa($mesaId);

        $payload = json_encode(array("mensaje" => "Mesa borrada con exito"));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }
  
    public function CerrarMesa($request, $response, $args){
      $parametros = $request->getParsedBody();
      
      $estadoMesa = $parametros['estadoMesa']; 
      $idMesa = $parametros['idMesa'];
      
      $m = Mesa::obtenerMesa($idMesa);
      $e = Mesa::ValidarEstado($estadoMesa);
      if($estadoMesa != NULL && $idMesa != NULL)
      { 
        if($e >= 0 && $e < 5)
        {
            $m->estadoMesa = $estadoMesa; 
            $m->modificar();
            $payload = json_encode(array("mensaje" => "Mesa cerrada"));
        }
        else
        {
        $payload = json_encode(array("error" => "Error al cerrar la mesa"));    
        }  
      }
      $response->getBody()->write($payload);
      return $response ->withHeader('Content-Type', 'application/json');
    }
}
?>