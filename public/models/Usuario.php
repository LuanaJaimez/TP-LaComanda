<?php
require_once './db/AccesoDatos.php';

class Usuario
{
    public $id_user;
    public $nombre;
    public $apellido;
    public $mail;
    public $clave;
    public $puesto;
    public $estado;

    public function crearUsuario()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO usuarios (nombre, apellido, mail, clave, puesto, estado) VALUES (:nombre, :apellido, :mail, :clave, :puesto, :estado)");
        $claveHash = password_hash($this->clave, PASSWORD_DEFAULT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $claveHash);
        $consulta->bindValue(':puesto', $this->puesto, PDO::PARAM_STR);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

    public static function obtenerTodos()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT id_user, nombre, apellido, mail, clave, puesto, estado FROM usuarios");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }

    public static function obtenerUsuario($id_user)
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT id_user, nombre, apellido, mail, clave, puesto, estado FROM usuarios WHERE id_user = :id_user");
        $consulta->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetchObject('Usuario');
    }

    public function modificarUsuario($id_user)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE usuarios SET nombre = :nombre, apellido = :apellido,mail = :mail, clave = :clave, puesto = :puesto, estado = :estado WHERE id_user = :id_user");
        $claveHash = password_hash($this->clave, PASSWORD_DEFAULT);
        $consulta->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $claveHash);
        $consulta->bindValue(':puesto', $this->puesto, PDO::PARAM_STR);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function borrarUsuario($id_user)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE usuarios SET fechaBaja = :fechaBaja WHERE id_user = :id_user");
        $fecha = new DateTime(date("d-m-Y"));
        $consulta->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $consulta->bindValue(':fechaBaja', date_format($fecha, 'Y-m-d H:i:s'));
        $consulta->execute();
    }

    public function Validar()
    {
        switch($this->estado)
            {
                case 'Disponible':
                case 'Suspendido':
                case 'Baja':
                    break;
                default:
                    throw new Exception ("Estado invalido");
            }

            switch($this->puesto)
            {
                case 'Bartender':
                case 'Cervecero':
                case 'Cocinero':
                case 'Mozo':
                case 'Socio':
                    break;
                default:
                    throw new Exception ("Perfil invalido");
            }
    }
}