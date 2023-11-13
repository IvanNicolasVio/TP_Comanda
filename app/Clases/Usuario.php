<?php

require_once './app/db/ConexionBD.php';

class Usuario
{
    public $id;
    public $nombre;
    private $_tipo;
    private $_dni;

    public function __construct($nombre,$tipo,$dni)
    {
        $this->nombre = $nombre;
        $this->SetTipo($tipo);
        $this->SetDNI($dni);
    }

    private function GetTipo()
    {
        $tipo = $this->_tipo;
        return $tipo;
    }

    private function SetTipo($tipo)
    {
        $this->_tipo = $tipo;
    }

    private function SetDNI($dni)
    {
        $this->_dni = $dni;
    }

    private function GetDNI()
    {
        $dni = $this->_dni;
        return $dni;
    }

    public function crearUsuario()
    {
        $objAccesoDatos = ConexionBD::obtenerInstancia();
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO empleados (nombre, tipo, dni) VALUES (:nombre, :tipo, :dni)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->GetTipo(), PDO::PARAM_STR);
        $consulta->bindValue(':dni', $this->GetDNI(), PDO::PARAM_INT);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }
}

?>