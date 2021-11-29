<?php
require_once './db/AccesoDatos.php';

class Mesa{
    public $numero;
    public $estadoMesa;
    public $idUser;

    public function crearMesa()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO mesas (estadoMesa, idUser) VALUES (:estadoMesa, :idUser)");
        $consulta->bindValue(':estadoMesa', $this->estadoMesa, PDO::PARAM_STR);
        $consulta->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

    public static function obtenerTodos()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT numero, estadoMesa, idUser FROM mesas");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Mesa');
    }

    public static function obtenerMesa($numero)
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT numero, estadoMesa, idUser FROM mesas WHERE numero = :numero");
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetchObject('Mesa');
    }

    public function modificarMesa($numero)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE mesas SET estadoMesa = :estadoMesa, idUser = :idUser WHERE numero = :numero");
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->bindValue(':estadoMesa', $this->estadoMesa, PDO::PARAM_STR);
        $consulta->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $consulta->execute();
    }

    public function borrarMesa($numero)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE mesas WHERE numero = :numero");
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->execute();
    }

    public function Mostrar()
    {
        echo "---- MESA ----"."\n\n";
        echo "Numero: ".$this->numero."\n\n";
        echo "Estado: ".$this->estadoMesa."\n\n";
        echo "Usuario: ".$this->idUser."\n\n";
    }

    public static function Listar($lista)
    {
        foreach ($lista as $obj)
        {
            $obj->Mostrar();
        }
    }

    public function ValidarEstado()
    {
        switch($this->estadoMesa)
        {
            case 'Cerrada':
                return 1;
            case 'Esperando':
                return 2;
            case 'Comiendo':
                return 3;
            case 'Pagando':
                return 4;
                break;
            default:
                throw new Exception ("Estado invalido");
        }
    }

    public static function ActualizarMesa($estadoMesa, $idMesa)
    {
        $estadoMesa = $estadoMesa; 
        $idMesa = $idMesa;
        $e = new Mesa();
        
        $m = Mesa::obtenerMesa($idMesa);
        $e->ValidarEstado($estadoMesa);
        if($estadoMesa != NULL && $idMesa != NULL)
        { 
          if($e > 0 && $e < 5)
          {
              $m->estadoMesa = $estadoMesa;
              $m->modificar();
              echo 'Mesa actualizada';
              return TRUE;
          }
          else
          {
              echo 'Error al actualizar';  
          }
        }
        return FALSE;
      }

    public static function ValidarUser($id)
    {        
        $lista = Usuario::obtenerTodos();

        foreach ($lista as $u)
        {
            if($id == $u->idUser)
            {
                if($u->idPuesto == 4 || $u->idPuesto == 5)
                {
                    return TRUE;
                }
            }
        }
        echo "El usuario debe ser un Mozo o Socio" . "\n";
        return FALSE;
    }
}


?>