<?php

class RutinaDAO {

    private $conexion;

    public function __construct()
    {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarRutina(RutinaDTO $rutinaDTO) {
        $sql = "INSERT INTO rutinas (tipo, ejercicios, duracion, dia, descripcion, fk_id_entrenadores) values(:tipo, :ejercicios, :duracion, :dia, :descripcion, :fk_id_entrenadores)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':tipo' => $rutinaDTO->getTipo(),
            ':ejercicios' => $rutinaDTO->getEjercicios(),
            ':duracion' => $rutinaDTO->getDuracion(),
            ':dia' => $rutinaDTO->getDia(),
            ':descripcion' => $rutinaDTO->getDescripcion(),
            ':fk_id_entrenadores' => $rutinaDTO->getIdEntrenador()
        ));
        return $statement->rowCount();
    }
    
    public function obtenerRutinaById($id) {
        $sql = "SELECT rutinas.id, rutinas.tipo, rutinas.ejercicios, rutinas.duracion, rutinas.dia, rutinas.descripcion, entrenadores.id AS id_entrenador, entrenadores.nombre AS nombre_entrenador, entrenadores.url_foto AS url_foto_entrenador FROM rutinas INNER JOIN entrenadores ON rutinas.fk_id_entrenadores = entrenadores.id WHERE rutinas.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearRutinaDTO($result[0]);
        }
        return new RutinaDTO();
    }

    public function obtenerRutinas() {
        $sql = "SELECT rutinas.id, rutinas.tipo, rutinas.ejercicios, rutinas.duracion, rutinas.dia, rutinas.descripcion, entrenadores.id AS id_entrenador, entrenadores.nombre AS nombre_entrenador, entrenadores.url_foto AS url_foto_entrenador FROM rutinas INNER JOIN entrenadores ON rutinas.fk_id_entrenadores = entrenadores.id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $rutinasDTO = array();
        foreach($result as $rutina) {
            array_push($rutinasDTO, $this->crearRutinaDTO($rutina));
        }
        return $rutinasDTO;
    }

    //Obtiene las rutinas que tiene un cliente
    public function obtenerRutinasByIdCliente($idCliente) {
        $sql = "SELECT DISTINCT rutinas.id, rutinas.tipo, rutinas.ejercicios, rutinas.duracion, rutinas.dia, rutinas.descripcion, entrenadores.id AS id_entrenador, entrenadores.nombre AS nombre_entrenador, entrenadores.url_foto AS url_foto_entrenador FROM clientes_rutinas INNER JOIN entrenadores INNER JOIN rutinas ON rutinas.fk_id_entrenadores = entrenadores.id AND clientes_rutinas.fk_id_rutinas = rutinas.id WHERE clientes_rutinas.fk_id_clientes = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $idCliente
        ));
        $result = $statement->fetchAll();
        $rutinasDTO = array();
        foreach($result as $rutina) {
            array_push($rutinasDTO, $this->crearRutinaDTO($rutina));
        }
        return $rutinasDTO;
    }

    //Obtiene las rutinas que creo un entrenador
    public function obtenerRutinasByIdEntrenador($idEntrenador) {
        $sql = "SELECT rutinas.id, rutinas.tipo, rutinas.ejercicios, rutinas.duracion, rutinas.dia, rutinas.descripcion, entrenadores.id AS id_entrenador, entrenadores.nombre AS nombre_entrenador, entrenadores.url_foto AS url_foto_entrenador FROM rutinas INNER JOIN entrenadores ON rutinas.fk_id_entrenadores = entrenadores.id WHERE entrenadores.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $idEntrenador
        ));
        $result = $statement->fetchAll();
        $rutinasDTO = array();
        foreach($result as $rutina) {
            array_push($rutinasDTO, $this->crearRutinaDTO($rutina));
        }
        return $rutinasDTO;
    }

    public function actualizarRutinaById(RutinaDTO $rutinaDTO) {
        $sql = "UPDATE rutinas SET ";
        $args = array(
            ':id' => $rutinaDTO->getId(),
            ':tipo' => $rutinaDTO->getTipo(),
            ':ejercicios' => $rutinaDTO->getEjercicios(),
            ':duracion' => $rutinaDTO->getDuracion(),
            ':dia' => $rutinaDTO->getDia(),
            ':descripcion' => $rutinaDTO->getDescripcion(),
            ':fk_id_entrenadores' => $rutinaDTO->getIdEntrenador()
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

    public function eliminarRutinaById($id) {
        $sql = "DELETE FROM rutinas WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        return $statement->rowCount();
    }

    private function crearRutinaDTO($rutina) {
        $rutinaDTO = new RutinaDTO();
        $rutinaDTO->setId($rutina['id']);
        $rutinaDTO->setTipo($rutina['tipo']);
        $rutinaDTO->setEjercicios($rutina['ejercicios']);
        $rutinaDTO->setDuracion($rutina['duracion']);
        $rutinaDTO->setDia($rutina['dia']);
        $rutinaDTO->setDescripcion($rutina['descripcion']);
        $rutinaDTO->setIdEntrenador($rutina['id_entrenador']);
        $rutinaDTO->setNombreEntrenador($rutina['nombre_entrenador']);
        $rutinaDTO->setUrlFotoEntrenador($rutina['url_foto_entrenador']);
        return $rutinaDTO;
    }

}