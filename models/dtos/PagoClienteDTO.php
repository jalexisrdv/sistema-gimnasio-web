<?php

class PagoClienteDTO {

    private $id;
    private $fechaPagoRealizado;
    private $fechaCortePago;
    private $idCliente;
    private $idSucursal;
    private $nombreCliente;
    private $nombreSucursal;
    private $status;

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFechaPagoRealizado()
    {
        return $this->fechaPagoRealizado;
    }

    public function setFechaPagoRealizado($fechaPagoRealizado)
    {
        $this->fechaPagoRealizado = $fechaPagoRealizado;
    }

    public function getFechaCortePago()
    {
        return $this->fechaCortePago;
    }

    public function setFechaCortePago($fechaCortePago)
    {
        $this->fechaCortePago = $fechaCortePago;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getIdSucursal()
    {
        return $this->idSucursal;
    }

    public function setIdSucursal($idSucursal)
    {
        $this->idSucursal = $idSucursal;
    }

    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    public function getNombreSucursal()
    {
        return $this->nombreSucursal;
    }

    public function setNombreSucursal($nombreSucursal)
    {
        $this->nombreSucursal = $nombreSucursal;
    }

}