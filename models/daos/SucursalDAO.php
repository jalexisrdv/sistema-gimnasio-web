<?php

class SucursalDAO {

    private $conexion;

    public function __construct()
    {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarSucursal(SucursalDTO $sucursalDTO) {
        $sql = "INSERT INTO sucursales (nombre, direccion, codigo_postal, horarios, status) values (:nombre, :direccion, :codigo_postal, :horarios, :status)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':nombre' => $sucursalDTO->getNombre(),
            ':direccion' => $sucursalDTO->getDireccion(),
            ':codigo_postal' => $sucursalDTO->getCodigoPostal(),
            ':horarios' => $sucursalDTO->getHorarios(),
            ':status' =>$sucursalDTO->getStatus()
        ));
        return $statement->rowCount();
    }

    public function obtenerSucursalById($id) {
        $sql = "SELECT id, nombre, direccion, codigo_postal, horarios, status FROM sucursales WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearSucursalDTO($result[0]);
        }
        return new SucursalDTO();
    }

    public function obtenerSucursales() {
        $sql = "SELECT id, nombre, direccion, codigo_postal, horarios, status FROM sucursales";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $sucursalesDTO = array();
        foreach($result as $sucursal) {
            array_push($sucursalesDTO, $this->crearSucursalDTO($sucursal));
        }
        return $sucursalesDTO;
    }

    public function actualizarSucursalById(SucursalDTO $sucursalDTO) {
        $sql = "UPDATE sucursales SET ";
        $args = array(
            ':id' => $sucursalDTO->getId(),
            ':nombre' => $sucursalDTO->getNombre(),
            ':direccion' => $sucursalDTO->getDireccion(),
            ':codigo_postal' => $sucursalDTO->getCodigoPostal(),
            ':horarios' => $sucursalDTO->getHorarios(),
            ':status' => $sucursalDTO->getStatus()
        );
        $argsPrepare = array();
        foreach($args as $clave => $valor) {
            if(isset($valor)) {
                if($clave != ':id') {
                    $sql .= substr($clave, 1, strlen($clave)) . " = " . $clave . ", ";
                }
                $argsPrepare[$clave] = $valor;
            }
        }
        $sql = substr_replace($sql, " WHERE id = :id", -2);
        $statement = $this->conexion->prepare($sql);
        $statement->execute($argsPrepare);
        return $statement->rowCount();
    }

    public function eliminarSucursalById($id) {
        $sql = "DELETE FROM sucursales WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        return $statement->rowCount();
    }

    public function asignarFechaImportanteById($idSucursal, $idFechaImportante) {
        $sql = "INSERT INTO fechas_importantes_sucursales (fk_id_fechas_importantes, fk_id_sucursales) values(:fk_id_fechas_importantes, :fk_id_sucursales)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':fk_id_fechas_importantes' => $idFechaImportante,
            ':fk_id_sucursales' => $idSucursal
        ));
        return $statement->rowCount();
    }

    private function crearSucursalDTO($sucursal) {
        $sucursalDTO = new SucursalDTO();
        $sucursalDTO->setId($sucursal['id']);
        $sucursalDTO->setNombre($sucursal['nombre']); 
        $sucursalDTO->setDireccion($sucursal['direccion']); 
        $sucursalDTO->setCodigoPostal($sucursal['codigo_postal']); 
        $sucursalDTO->setHorarios($sucursal['horarios']); 
        $sucursalDTO->setStatus($sucursal['status']);
        return $sucursalDTO;
    }
    
}