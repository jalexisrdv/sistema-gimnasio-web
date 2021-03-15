<?php

class SucursalDTO {

    private $id;
    private $nombre;
    private $direccion;
    private $codigoPostal;
    private $horarios;
    private $status;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getCodigoPostal(){
		return $this->codigoPostal;
	}

	public function setCodigoPostal($codigoPostal){
		$this->codigoPostal = $codigoPostal;
	}

	public function getHorarios(){
		return $this->horarios;
	}

	public function setHorarios($horarios){
		$this->horarios = $horarios;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

}