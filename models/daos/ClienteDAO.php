<?php

class ClienteDAO {

    private $conexion;

    public function __construct() {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarCliente(ClienteDTO $clienteDTO) {
        $sql = "INSERT INTO clientes (nombre, apellidos, fecha_nacimiento, email, fecha_ingreso, nivel_cliente, estatura, peso_inicial, peso_progreso, url_foto, fk_id_sucursales, fk_id_usuarios) values (:nombre, :apellidos, :fecha_nacimiento, :email, :fecha_ingreso, :nivel_cliente, :estatura, :peso_inicial, :peso_progreso, :url_foto, :fk_id_sucursales, :fk_id_usuarios)";
        $args = array(
            ':nombre' => $clienteDTO->getNombre(),
            ':apellidos' => $clienteDTO->getApellidos(),
            ':fecha_nacimiento' => $clienteDTO->getFechaNacimiento(),
            ':email' => $clienteDTO->getEmail(),
            ':fecha_ingreso' => $clienteDTO->getFechaIngreso(),
            ':nivel_cliente' => $clienteDTO->getNivelCliente(),
            ':estatura' => $clienteDTO->getEstatura(),
            ':peso_inicial' => $clienteDTO->getPesoInicial(),
            ':peso_progreso' => $clienteDTO->getPesoProgreso(),
            ':url_foto' => $clienteDTO->getUrlFoto(),
            ':fk_id_sucursales' => $clienteDTO->getIdSucursal(),
            ':fk_id_usuarios' => $clienteDTO->getIdUsuario()
        );
        $statement = $this->conexion->prepare($sql);
        $statement->execute($args);
        return $statement->rowCount();
    }

    public function existeRutinaAsignada($idCliente, $idRutina) {
        $sql ="SELECT fk_id_clientes, fk_id_rutinas FROM clientes_rutinas WHERE fk_id_clientes = :id_cliente AND fk_id_rutinas = :id_rutina";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id_cliente' => $idCliente,
            ':id_rutina' => $idRutina
        ));
        $result = $statement->fetchAll();
        if($result) {
            return true;
        }
        return false;
    }

    public function eliminarRutinaAsignada($idCliente, $idRutina) {
        $sql = "DELETE FROM clientes_rutinas WHERE fk_id_clientes = :id_cliente AND fk_id_rutinas = :id_rutina";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id_rutina' => $idRutina,
            'id_cliente' => $idCliente
        ));
        return $statement->rowCount();
    }

    public function obtenerClienteById($id) {
        $sql = "SELECT clientes.id, clientes.nombre, clientes.apellidos, clientes.fecha_nacimiento, clientes.email, clientes.fecha_ingreso, clientes.nivel_cliente, clientes.estatura, clientes.peso_inicial, clientes.peso_progreso, clientes.url_foto, clientes.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM clientes INNER JOIN sucursales INNER JOIN usuarios ON clientes.fk_id_sucursales = sucursales.id AND clientes.fk_id_usuarios = usuarios.id WHERE clientes.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearClienteDTO($result[0]);
        }
        return new ClienteDTO();
    }

    public function obtenerClienteByIdUsuario($id) {
        $sql = "SELECT clientes.id, clientes.nombre, clientes.apellidos, clientes.fecha_nacimiento, clientes.email, clientes.fecha_ingreso, clientes.nivel_cliente, clientes.estatura, clientes.peso_inicial, clientes.peso_progreso, clientes.url_foto, clientes.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM clientes INNER JOIN sucursales INNER JOIN usuarios ON clientes.fk_id_sucursales = sucursales.id AND clientes.fk_id_usuarios = usuarios.id WHERE clientes.fk_id_usuarios = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearClienteDTO($result[0]);
        }
        return new ClienteDTO();
    }

    public function obtenerClientes() {
        $sql = "SELECT clientes.id, clientes.nombre, clientes.apellidos, clientes.fecha_nacimiento, clientes.email, clientes.fecha_ingreso, clientes.nivel_cliente, clientes.estatura, clientes.peso_inicial, clientes.peso_progreso, clientes.url_foto, clientes.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM clientes INNER JOIN sucursales INNER JOIN usuarios ON clientes.fk_id_sucursales = sucursales.id AND clientes.fk_id_usuarios = usuarios.id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clientesDTO = array();
        foreach($result as $cliente) {
            array_push($clientesDTO, $this->crearClienteDTO($cliente));
        }
        return $clientesDTO;
    }

    //Obtiene los clientes del entrenador
    public function obtenerClientesByIdEntrenador($idEntrenador) {
        $sql = "SELECT DISTINCT clientes.id, clientes.nombre, clientes.apellidos, clientes.fecha_nacimiento, clientes.email, clientes.fecha_ingreso, clientes.nivel_cliente, clientes.estatura, clientes.peso_inicial, clientes.peso_progreso, clientes.url_foto, clientes.fk_id_usuarios AS id_usuario, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, usuarios.nick, usuarios.status FROM clientes_rutinas INNER JOIN entrenadores INNER JOIN rutinas INNER JOIN clientes INNER JOIN usuarios INNER JOIN sucursales ON rutinas.fk_id_entrenadores = entrenadores.id AND clientes_rutinas.fk_id_rutinas = rutinas.id AND clientes.id = clientes_rutinas.fk_id_clientes AND clientes.fk_id_usuarios = usuarios.id AND sucursales.id = clientes.fk_id_sucursales WHERE rutinas.fk_id_entrenadores = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $idEntrenador
        ));
        $result = $statement->fetchAll();
        $clientesDTO = array();
        foreach($result as $cliente) {
            array_push($clientesDTO, $this->crearClienteDTO($cliente));
        }
        return $clientesDTO;
    }

    public function actualizarClienteById(ClienteDTO $clienteDTO) {
        $sql = "UPDATE clientes SET ";
        $args = array(
            ':id' => $clienteDTO->getId(),
            ':nombre' => $clienteDTO->getNombre(),
            ':apellidos' => $clienteDTO->getApellidos(),
            ':fecha_nacimiento' => $clienteDTO->getFechaNacimiento(),
            ':email' => $clienteDTO->getEmail(),
            ':fecha_ingreso' => $clienteDTO->getFechaIngreso(),
            ':nivel_cliente' => $clienteDTO->getNivelCliente(),
            ':estatura' => $clienteDTO->getEstatura(),
            ':peso_inicial' => $clienteDTO->getPesoInicial(),
            ':peso_progreso' => $clienteDTO->getPesoProgreso(),
            ':url_foto' => $clienteDTO->getUrlFoto(),
            ':fk_id_sucursales' => $clienteDTO->getIdSucursal()
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

    public function asignarRutinaById($idUsuario, $idRutina) {
        $sql = "INSERT INTO clientes_rutinas (fk_id_clientes, fk_id_rutinas) values(:fk_id_clientes, :fk_id_rutinas)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':fk_id_clientes' => $idUsuario,
            ':fk_id_rutinas' => $idRutina
        ));
        return $statement->rowCount();
    }

    public function contarClientes() {
        $sql = "SELECT COUNT(id) AS total FROM clientes";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        return $result['total'];
    }

    private function crearClienteDTO($cliente) {
        $clienteDTO = new ClienteDTO();
        $clienteDTO->setId($cliente['id']);
        $clienteDTO->setNombre($cliente['nombre']);
        $clienteDTO->setApellidos($cliente['apellidos']);
        $clienteDTO->setFechaNacimiento($cliente['fecha_nacimiento']);
        $clienteDTO->setEmail($cliente['email']);
        $clienteDTO->setFechaIngreso($cliente['fecha_ingreso']);
        $clienteDTO->setNivelCliente($cliente['nivel_cliente']);
        $clienteDTO->setEstatura($cliente['estatura']);
        $clienteDTO->setPesoInicial($cliente['peso_inicial']);
        $clienteDTO->setPesoProgreso($cliente['peso_progreso']);
        $clienteDTO->setUrlFoto($cliente['url_foto']);
        $clienteDTO->setIdSucursal($cliente['id_sucursal']);
        $clienteDTO->setNombreSucursal($cliente['nombre_sucursal']);
        $clienteDTO->setIdUsuario($cliente['id_usuario']);
        $clienteDTO->setNick($cliente['nick']);
        $clienteDTO->setStatus($cliente['status']);
        return $clienteDTO;
    }
    
}