<?php

class UsuarioDAO {

    private $conexion;

    public function __construct()
    {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarUsuario(UsuarioDTO $usuarioDTO) {
        $sql = "INSERT INTO usuarios (nick, password, tipo, status) values (:nick, :password, :tipo, :status)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':nick' => $usuarioDTO->getNick(),
            ':password' => $usuarioDTO->getPassword(),
            ':tipo' => $usuarioDTO->getTipo(),
            ':status' => $usuarioDTO->getStatus()
        ));
        return $statement->rowCount();
    }

    public function obtenerUsuarioById($id) {
        $sql = "SELECT id, nick, password, tipo, status FROM usuarios WHERE id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearUsuarioDTO($result[0]);
        }
        return new UsuarioDTO();
    }

    public function obtenerUsuarioByNick($nick) {
        $sql = "SELECT id, nick, password, tipo, status FROM usuarios WHERE nick = :nick";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':nick' => $nick
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearUsuarioDTO($result[0]);
        }
        return new UsuarioDTO();
    }

    public function obtenerUltimoRegistro() {
        $sql = "SELECT MAX(ID) AS id FROM usuarios";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if($result) {
            return $result[0]['id'];
        }
        return -1;
    }

    public function obtenerUsuarios() {
        $sql = "SELECT id, nick, password, tipo, status FROM usuarios";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $usuariosDTO = array();
        foreach($result as $usuario) {
            array_push($usuariosDTO, $this->crearUsuarioDTO($usuario));
        }
        return $usuariosDTO;
    }

    public function actualizarUsuarioById(UsuarioDTO $usuarioDTO) {
        $sql = "UPDATE usuarios SET ";
        $args = array(
            ':id' => $usuarioDTO->getId(),
            ':nick' => $usuarioDTO->getNick(),
            ':password' => $usuarioDTO->getPassword(),
            ':tipo' => $usuarioDTO->getTipo(),
            ':status' => $usuarioDTO->getStatus()
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

    public function existeUsuario($usuario, $password) {
        $sql = "SELECT id, nick, password, tipo, status FROM usuarios WHERE nick = :nick AND password = :password";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':nick' => $usuario,
            ':password' => $password
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearUsuarioDTO($result[0]);
        }
        return new UsuarioDTO();
    }

    private function crearUsuarioDTO($usuario) {
        $usuarioDTO = new UsuarioDTO();
        $usuarioDTO->setId($usuario['id']);
        $usuarioDTO->setNick($usuario['nick']);
        $usuarioDTO->setPassword($usuario['password']);
        $usuarioDTO->setTipo($usuario['tipo']);
        $usuarioDTO->setStatus($usuario['status']);
        return $usuarioDTO;
    }

}