<?php
require_once './db/AccesoDatos.php';

class Mesa{
    public $numero;
    public $estadoMesa;

    public function crearMesa()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO mesas (estadoMesa) VALUES (:estadoMesa)");
        $consulta->bindValue(':estadoMesa', $this->estadoMesa, PDO::PARAM_STR);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

    public static function obtenerTodos()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT numero, estadoMesa FROM mesas");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Mesa');
    }

    public static function obtenerMesa($numero)
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT numero, estadoMesa FROM mesas WHERE numero = :numero");
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetchObject('Mesa');
    }

    public function modificarMesa($numero)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE mesas SET estadoMesa = :estadoMesa WHERE numero = :numero");
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->bindValue(':estadoMesa', $this->estadoMesa, PDO::PARAM_STR);
        $consulta->execute();
    }

    public function borrarMesa($numero)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE mesas SET fechaBaja = :fechaBaja WHERE numero = :numero");
        $fecha = new DateTime(date("d-m-Y"));
        $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
        $consulta->bindValue(':fechaBaja', date_format($fecha, 'Y-m-d H:i:s'));
        $consulta->execute();
    }

    public function Validar()
    {
        switch($this->estadoMesa)
            {
                case 'Cerrada':
                case 'Esperando':
                case 'Comiendo':
                case 'Pagando':
                    break;
                default:
                    throw new Exception ("Estado invalido");
            }
    }
}


?>