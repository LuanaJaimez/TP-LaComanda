<?php
require_once './db/AccesoDatos.php';

class Pedido{
    public $codigo;
    public $idMesa;
    public $idUser;
    public $estado;
    public $total;
    public $fecha;
    public $foto;
    public $tiempo;
    public $datosProducto; //Id del Producto
    public $cantidad; //Cantidad del Producto

    public function crearPedido()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO pedidos (codigo, idMesa, datosProducto, idUser, estado, total, cantidad, tiempo, fecha, foto) VALUES (:codigo, :idMesa, :datosProducto, :idUser, :estado, :total, :cantidad, :tiempo, :fecha, :foto)");
        $consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);
        $consulta->bindValue(':idMesa', $this->idMesa, PDO::PARAM_INT);
        $consulta->bindValue(':datosProducto', $this->datosProducto, PDO::PARAM_STR);
        $consulta->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
        $consulta->bindValue(':total', $this->total, PDO::PARAM_INT);
        $consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
        $consulta->bindValue(':tiempo', $this->tiempo, PDO::PARAM_INT);
        $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

    public static function obtenerTodos()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT codigo, idMesa, datosProducto, idUser, estado, total, cantidad, tiempo, fecha, foto FROM pedidos");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Pedido');
    }

    public static function obtenerPedido($codigo)
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT codigo, idMesa, datosProducto, idUser, estado, total, cantidad, tiempo, fecha, foto FROM pedidos WHERE codigo = :codigo");
        $consulta->bindValue(':codigo', $codigo, PDO::PARAM_STR);
        $consulta->execute();

        return $consulta->fetchObject('Pedido');
    }

    public static function obtenerPedidoPendiente()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT codigo, idMesa, datosProducto, idUser, estado, total, cantidad, tiempo, fecha, foto FROM pedidos WHERE pedidos.estado = 'Pendiente'");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Pedido');
    }

    public function modificarPedido()
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE pedidos SET idMesa = :idMesa, datosProducto = :datosProducto,idUser = :idUser, estado = :estado, total = :total, cantidad = :cantidad, tiempo = :tiempo, fecha = :fecha, foto = :foto WHERE codigo = :codigo");
        $consulta->bindValue(':idMesa', $this->idMesa, PDO::PARAM_INT);
        $consulta->bindValue(':datosProducto', $this->datosProducto, PDO::PARAM_STR);
        $consulta->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
        $consulta->bindValue(':total', $this->total, PDO::PARAM_STR);
        $consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
        $consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
        $consulta->bindValue(':tiempo', $this->tiempo, PDO::PARAM_INT);
        $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function borrarPedido($codigo)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("DELETE FROM pedidos WHERE codigo = :codigo");
        $consulta->bindValue(':codigo', $codigo, PDO::PARAM_STR);
        $consulta->execute();
    }

    public function Mostrar()
    {
        echo "---- PEDIDO ----"."\n";
        echo "Codigo: ".$this->codigo."\n";
        echo "Mesa: ".$this->idMesa."\n";
        echo "Estado: ".$this->estado."\n";
        echo "Usuario: ".$this->idUser."\n";
        echo "Producto: ".$this->datosProducto."\n";
        echo "Tiempo estimado de espera: ".$this->tiempo."\n";
        echo "Total: ".$this->total."\n";
    }

    public static function Listar($lista)
    {
        foreach ($lista as $obj)
        {
            $obj->Mostrar();
        }
    }

    public function ValidarProducto($p)
    {
        $lista = Producto::obtenerTodos();
        if($lista != null)
        {
            foreach ($lista as $produc)
            {
                if($p == $produc->idProduc)
                {
                    return TRUE;
                }
            }
            return TRUE;
        }
        echo "El producto no se encuentra disponible" . "\n";
        return FALSE;
    }

    public function ValidarEstado($e)
    {
        switch($e)
        {
            case 'Pendiente':
                return 'Pendiente';
            case 'En preparacion':
                return 'En preparacion';
            case 'Listo para servir':
                return 'Listo para servir';
            case 'Servido':
                return 'Servido';
            default:
                throw new Exception ("Tipo de producto invalido");
        }
    }

    public function ActualizarPedido($estado, $codigo, $idUser, $datosProducto)
    {
      $estado = $estado;
      $codigo = $codigo;
      $idUser = $idUser;
      $datosProducto = $datosProducto;
      $fecha = new datetime("now");

      $usuario = Usuario::obtenerUsuario($idUser);
      $lista = Pedido::obtenerPedido($codigo);
      if($usuario != NULL && $lista != NULL)
      {
        foreach ($lista as $pd)
        {
          if($datosProducto == $pd->datosProducto && $pd->idUser == $usuario->idUser){
            $pd->estado = $estado;
            $pd->fecha = $fecha->format("Y-m-d");
            $pd->tiempo = ((Producto::obtenerProducto($datosProducto))->tiempo) * $pd->cantidad;
            $pd->modificar();
            $pd->mostrarPedido();
          }
        }
        echo 'Pedido Actualizado';
        return TRUE;
      }
    return FALSE;
  }

    public static function CrearCodigo()
    {
        $codigo = bin2hex(random_bytes(4));
        return $codigo;
    }

    public static function Total($lista)
    {
        $monto = 0;
        foreach ($lista as $obj)
        {
            $monto = $lista->precio + $monto;
        }
        return $monto;
    }

    public function GuardarFoto($foto)
    {
        $path= 'FotosMesas/';
        if (!file_exists($path))
        {
            mkdir('FotosMesas/', 0777, true);    
        }
        $extension = explode(".", $foto["name"]);
        
        $destino = $path.$this->codigo."-".$this->idMesa." - ".$this->datosProducto."_".end($extension);
    
        if(move_uploaded_file($foto["tmp_name"],$destino))
        {
            echo "\nArchivo movido con exito en destino!\n  ";
            $this->foto = $destino;
        }
        else
        {
            echo "Error";
            var_dump($foto["error"]);
        }
    }


}


?>