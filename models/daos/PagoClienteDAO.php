<?php

class PagoClienteDAO {

    private $conexion;

    public function __construct()
    {
        require_once 'Conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function insertarPagoCliente(PagoClienteDTO $pagoClienteDTO) {
        $sql = "INSERT INTO pagos_clientes (fecha_pago_realizado, fecha_corte_pago, fk_id_clientes, fk_id_sucursales, status) values (:fecha_pago_realizado, :fecha_corte_pago, :fk_id_clientes, :fk_id_sucursales, :status)";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':fecha_pago_realizado' => $pagoClienteDTO->getFechaPagoRealizado(),
            ':fecha_corte_pago' => $pagoClienteDTO->getFechaCortePago(),
            ':fk_id_clientes' => $pagoClienteDTO->getIdCliente(),
            ':fk_id_sucursales' => $pagoClienteDTO->getIdSucursal(),
            ':status' => $pagoClienteDTO->getStatus()
        ));
        return $statement->rowCount();
    }

    public function obtenerPagoClienteById($id) {
        $sql = "SELECT pagos_clientes.id, pagos_clientes.fecha_pago_realizado, pagos_clientes.fecha_corte_pago, clientes.id AS id_cliente, clientes.nombre AS nombre_cliente, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, pagos_clientes.status FROM pagos_clientes INNER JOIN sucursales INNER JOIN clientes ON pagos_clientes.fk_id_clientes = clientes.id AND pagos_clientes.fk_id_sucursales = sucursales.id WHERE pagos_clientes.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $id
        ));
        $result = $statement->fetchAll();
        if($result) {
            return $this->crearPagoClienteDTO($result[0]);
        }
        return new PagoClienteDTO();
    }

    public function obtenerPagosClientes() {
        $sql = "SELECT pagos_clientes.id, pagos_clientes.fecha_pago_realizado, pagos_clientes.fecha_corte_pago, clientes.id AS id_cliente, clientes.nombre AS nombre_cliente, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, pagos_clientes.status FROM pagos_clientes INNER JOIN sucursales INNER JOIN clientes ON pagos_clientes.fk_id_clientes = clientes.id AND pagos_clientes.fk_id_sucursales = sucursales.id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $pagosClientes = array();
        foreach($result as $pagoCliente) {
            array_push($pagosClientes, $this->crearPagoClienteDTO($pagoCliente));
        }
        return $pagosClientes;
    }

    //Obtiene los pagos de un cliente
    public function obtenerPagosByIdCliente($idCliente) {
        $sql = "SELECT pagos_clientes.id, pagos_clientes.fecha_pago_realizado, pagos_clientes.fecha_corte_pago, clientes.id AS id_cliente, clientes.nombre AS nombre_cliente, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, pagos_clientes.status FROM pagos_clientes INNER JOIN sucursales INNER JOIN clientes ON pagos_clientes.fk_id_clientes = clientes.id AND pagos_clientes.fk_id_sucursales = sucursales.id WHERE clientes.id = :id";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':id' => $idCliente
        ));
        $result = $statement->fetchAll();
        $pagosClientes = array();
        foreach($result as $pagoCliente) {
            array_push($pagosClientes, $this->crearPagoClienteDTO($pagoCliente));
        }
        return $pagosClientes;
    }

    public function actualizarPagoClienteById(PagoClienteDTO $pagoClienteDTO) {
        $sql = "UPDATE pagos_clientes SET ";
        $args = array(
            ':id' => $pagoClienteDTO->getId(),
            ':fecha_pago_realizado' => $pagoClienteDTO->getFechaPagoRealizado(),
            ':fecha_corte_pago' => $pagoClienteDTO->getFechaCortePago(),
            ':fk_id_clientes' => $pagoClienteDTO->getIdCliente(),
            ':fk_id_sucursales' => $pagoClienteDTO->getIdSucursal(),
            ':status' => $pagoClienteDTO->getStatus()
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

    public function obtenerPagosVencidos() {
        $sql = "SELECT pagos_clientes.id, pagos_clientes.fecha_pago_realizado, pagos_clientes.fecha_corte_pago, clientes.id AS id_cliente, clientes.nombre AS nombre_cliente, sucursales.id AS id_sucursal, sucursales.nombre AS nombre_sucursal, pagos_clientes.status FROM pagos_clientes INNER JOIN sucursales INNER JOIN clientes ON pagos_clientes.fk_id_clientes = clientes.id AND pagos_clientes.fk_id_sucursales = sucursales.id WHERE pagos_clientes.fecha_corte_pago < CURRENT_DATE() AND pagos_clientes.status = :status";
        $statement = $this->conexion->prepare($sql);
        $statement->execute(array(
            ':status' => 0
        ));
        $result = $statement->fetchAll();
        $pagosClientes = array();
        foreach($result as $pagoCliente) {
            array_push($pagosClientes, $this->crearPagoClienteDTO($pagoCliente));
        }
        return $pagosClientes;
    }

    private function crearPagoClienteDTO($pagoCliente) {
        $pagoClienteDTO = new PagoClienteDTO();
        $pagoClienteDTO->setId($pagoCliente['id']);
        $pagoClienteDTO->setFechaPagoRealizado($pagoCliente['fecha_pago_realizado']);
        $pagoClienteDTO->setFechaCortePago($pagoCliente['fecha_corte_pago']);
        $pagoClienteDTO->setIdCliente($pagoCliente['id_cliente']);
        $pagoClienteDTO->setNombreCliente($pagoCliente['nombre_cliente']);
        $pagoClienteDTO->setIdSucursal($pagoCliente['id_sucursal']);
        $pagoClienteDTO->setNombreSucursal($pagoCliente['nombre_sucursal']);
        $pagoClienteDTO->setStatus($pagoCliente['status']);
        return $pagoClienteDTO;
    } 

}