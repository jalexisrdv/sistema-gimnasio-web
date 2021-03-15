<?php

class EntrenadorDAO {
    
    private $conexion;

    public function __construct() {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarEntrenador(EntrenadorDTO $entrenadorDTO) {
        $sql = "INSERT INTO entrenadores (nombre, apellidos, fecha_nacimiento, fecha_ingreso, nivel_entrenador, estatura, peso, url_foto, horario, fk_id_sucursales, fk_id_usuarios) values (:nombre, :apellidos, :fecha_nacimiento, :fecha_ingreso, :nivel_entrenador, :estatura, :peso, :url_foto, :horario, :fk_id_sucursales, :fk_id_usuarios)";
        $args = array(
            ':nombre' => $entrenadorDTO->getNombre(),
            ':apellidos' => $entrenadorDTO->getApellidos(),
            ':fecha_nacimiento' => $entrenadorDTO->getFechaNacimiento(),
            ':fecha_ingreso' => $entrenadorDTO->getFechaIngreso(),
            ':nivel_entrenador' => $entrenadorDTO->getNivelEntrenador(),
            ':estatura' => $entrenadorDTO->getEstatura(),
            ':peso' => $entrenadorDTO->getPeso(),
            ':url_foto' => $entrenadorDTO->getUrlFoto(),
            ':horario' => $entrenadorDTO->getHorario(),
            ':fk_id_sucursales' => $entrenadorDTO->getIdSucursal(),
            ':fk_id_usuarios' => $entrenadorDTO->getIdUsuario()
        );
        $statement = $this->conexion->prepare($sql);
        $statement->execute($args);
        return $statement->rowCount();
    }

    public function obtenerEntrenadorById($id) {
        $sql = "SELECT entrenadores.id, entrenadores.nombre, entrenadores.apellidos, entrenadores.fecha_nacimiento, entrenadores.fecha_ingreso, entrenadores.nivel_entrenador, entrenadores.estatura, entrenadores.peso, entrenadores.url_foto, entrenadores.horario, entrenadores.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM entrenadores INNER JOIN sucursales INNER JOIN usuarios ON entrenadores.fk_id_sucursales = sucursales.id AND usuarios.id = entrenadores.fk_id_usuarios WHERE entrenadores.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearEntrenadorDTO($result[0]);
        }
        return new EntrenadorDTO();
    }

    public function obtenerEntrenadorByIdUsuario($id) {
        $sql = "SELECT entrenadores.id, entrenadores.nombre, entrenadores.apellidos, entrenadores.fecha_nacimiento, entrenadores.fecha_ingreso, entrenadores.nivel_entrenador, entrenadores.estatura, entrenadores.peso, entrenadores.url_foto, entrenadores.horario, entrenadores.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM entrenadores INNER JOIN sucursales INNER JOIN usuarios ON entrenadores.fk_id_sucursales = sucursales.id AND usuarios.id = entrenadores.fk_id_usuarios WHERE entrenadores.fk_id_usuarios = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearEntrenadorDTO($result[0]);
        }
        return new EntrenadorDTO();
    }

    public function obtenerEntrenadores() {
        $sql = "SELECT entrenadores.id, entrenadores.nombre, entrenadores.apellidos, entrenadores.fecha_nacimiento, entrenadores.fecha_ingreso, entrenadores.nivel_entrenador, entrenadores.estatura, entrenadores.peso, entrenadores.url_foto, entrenadores.horario, entrenadores.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM entrenadores INNER JOIN sucursales INNER JOIN usuarios ON entrenadores.fk_id_sucursales = sucursales.id AND usuarios.id = entrenadores.fk_id_usuarios";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $entrenadoresDTO = array();
        foreach($result as $entrenador) {
            array_push($entrenadoresDTO, $this->crearEntrenadorDTO($entrenador));
        }
        return $entrenadoresDTO;
    }

    public function actualizarEntrenadorById(EntrenadorDTO $entrenadorDTO) {
        $sql = "UPDATE entrenadores SET ";
        $args = array(
            ':id' => $entrenadorDTO->getId(),
            ':nombre' => $entrenadorDTO->getNombre(),
            ':apellidos' => $entrenadorDTO->getApellidos(),
            ':fecha_nacimiento' => $entrenadorDTO->getFechaNacimiento(),
            ':fecha_ingreso' => $entrenadorDTO->getFechaIngreso(),
            ':nivel_entrenador' => $entrenadorDTO->getNivelEntrenador(),
            ':estatura' => $entrenadorDTO->getEstatura(),
            ':peso' => $entrenadorDTO->getPeso(),
            ':url_foto' => $entrenadorDTO->getUrlFoto(),
            ':fk_id_sucursales' => $entrenadorDTO->getIdSucursal()
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

    public function contarEntrenadores() {
        $sql = "SELECT COUNT(id) AS total FROM entrenadores";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        return $result['total'];
    }

    private function crearEntrenadorDTO($entrenador) {
        $entrenadorDTO = new EntrenadorDTO();
        $entrenadorDTO->setId($entrenador['id']);
        $entrenadorDTO->setNombre($entrenador['nombre']);
        $entrenadorDTO->setApellidos($entrenador['apellidos']);
        $entrenadorDTO->setFechaNacimiento($entrenador['fecha_nacimiento']);
        $entrenadorDTO->setFechaIngreso($entrenador['fecha_ingreso']);
        $entrenadorDTO->setNivelEntrenador($entrenador['nivel_entrenador']);
        $entrenadorDTO->setEstatura($entrenador['estatura']);
        $entrenadorDTO->setPeso($entrenador['peso']);
        $entrenadorDTO->setUrlFoto($entrenador['url_foto']);
        $entrenadorDTO->setHorario($entrenador['horario']);
        $entrenadorDTO->setIdSucursal($entrenador['id_sucursal']);
        $entrenadorDTO->setNombreSucursal($entrenador['nombre_sucursal']);
        $entrenadorDTO->setIdUsuario($entrenador['id_usuario']);
        $entrenadorDTO->setNick($entrenador['nick']);
        $entrenadorDTO->setStatus($entrenador['status']);
        return $entrenadorDTO;
    }

}