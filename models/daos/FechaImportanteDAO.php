<?php

class FechaImportanteDAO {

    private $conexion;

    public function __construct()
    {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarFechaImportante(FechaImportanteDTO $fechaImportanteDTO) {
        $sql = "INSERT INTO fechas_importantes (start,title, descripcion, color) values (:start, :descripcion, :title, :color)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':start' => $fechaImportanteDTO->getStart(),
            ':descripcion' => $fechaImportanteDTO->getDescripcion(),
            ':title' => $fechaImportanteDTO->getTitle(),
            ':color' => $fechaImportanteDTO->getColor()
        ));
        return $statement->rowCount();
    }

    public function obtenerFechaImportanteById($id) {
        $sql = "SELECT id, `start`, title, descripcion, color FROM fechas_importantes WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearFechaImportanteDTO($result[0]);
        }
        return new FechaImportanteDTO();
    }

    public function obtenerFechasImportantes() {
        $sql = "SELECT  id, `start`, title, descripcion, color FROM fechas_importantes";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $fechasImportantesDTO = array();
        foreach($result as $fechaImportante) {
            array_push($fechasImportantesDTO, $this->crearFechaImportanteDTO($fechaImportante));
        }
        return $fechasImportantesDTO;
    }

    public function actualizarFechaImportanteById(FechaImportanteDTO $fechaImportanteDTO) {
        $sql = "UPDATE fechas_importantes SET ";
        $args = array(
            ':id' => $fechaImportanteDTO->getId(),
            ':start' => $fechaImportanteDTO->getStart(),
            ':descripcion' => $fechaImportanteDTO->getDescripcion(),
            ':title' => $fechaImportanteDTO->getTitle(),
            ':color' => $fechaImportanteDTO->getColor()
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

    public function eliminarFechaImportanteById($id) {
        $sql = "DELETE FROM fechas_importantes WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        return $statement->rowCount();
    }

    private function crearFechaImportanteDTO($fechaImportante) {
        $fechaImportanteDTO = new FechaImportanteDTO();
        $fechaImportanteDTO->setId($fechaImportante['id']);
        $fechaImportanteDTO->setStart($fechaImportante['start']);
        $fechaImportanteDTO->setTitle($fechaImportante['title']);
        $fechaImportanteDTO->setDescripcion($fechaImportante['descripcion']);
        $fechaImportanteDTO->setColor($fechaImportante['color']);
        return $fechaImportanteDTO;
    }
    
}