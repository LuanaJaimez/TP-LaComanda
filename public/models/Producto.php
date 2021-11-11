<?php
require_once './db/AccesoDatos.php';

class Producto{
    public $id_produc;
    public $nombre;
    public $precio;
    public $stock;
    public $tipo;
    public $perfilEmpleado;

    public function crearProducto()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO productos (nombre, precio, stock, tipo, perfilEmpleado) VALUES (:nombre, :precio, :stock, :tipo, :perfilEmpleado)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':perfilEmpleado', $this->perfilEmpleado, PDO::PARAM_STR);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

    public static function obtenerTodos()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT id_produc, nombre, precio, stock, tipo, perfilEmpleado FROM productos");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public static function obtenerProducto($id_produc)
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("SELECT id_produc, nombre, precio, stock, tipo, perfilEmpleado FROM productos WHERE id_produc = :id_produc");
        $consulta->bindValue(':id_produc', $id_produc, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetchObject('Producto');
    }

    public function modificarProducto($id_produc)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("UPDATE productos SET nombre = :nombre, precio = :precio,stock = :stock, tipo = :tipo, perfilEmpleado = :perfilEmpleado WHERE id_produc = :id_produc");
        $consulta->bindValue(':id_produc', $id_produc, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':perfilEmpleado', $this->perfilEmpleado, PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function borrarProducto($id_produc)
    {
        $objAccesoDato = AccesoDatos::obtenerInstancia();
        $consulta = $objAccesoDato->prepararConsulta("DELETE FROM productos WHERE id_produc = :id_produc");
        $consulta->bindValue(':id_produc', $id_produc, PDO::PARAM_INT);
        $consulta->execute();
    }
}

?>