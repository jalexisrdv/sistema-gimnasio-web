<?php

class ClienteDTO {

	private $id;
	private $nombre;
	private $apellidos;
	private $fechaNacimiento;
	private $email;
	private $fechaIngreso;
	private $nivelCliente;
	private $estatura;
	private $pesoInicial;
	private $pesoProgreso;
	private $urlFoto;
	private $idSucursal;
	private $nombreSucursal;
	private $idUsuario;
	private $nick;
	private $status;

	public function getIdUsuario()
	{
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setApellidos($apellidos)
	{
		$this->apellidos = $apellidos;
	}

	public function getFechaNacimiento()
	{
		return $this->fechaNacimiento;
	}

	public function setFechaNacimiento($fechaNacimiento)
	{
		$this->fechaNacimiento = $fechaNacimiento;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getFechaIngreso()
	{
		return $this->fechaIngreso;
	}

	public function setFechaIngreso($fechaIngreso)
	{
		$this->fechaIngreso = $fechaIngreso;
	}

	public function getNivelCliente()
	{
		return $this->nivelCliente;
	}

	public function setNivelCliente($nivelCliente)
	{
		$this->nivelCliente = $nivelCliente;
	}

	public function getEstatura()
	{
		return $this->estatura;
	}

	public function setEstatura($estatura)
	{
		$this->estatura = $estatura;
	}

	public function getPesoInicial()
	{
		return $this->pesoInicial;
	}

	public function setPesoInicial($pesoInicial)
	{
		$this->pesoInicial = $pesoInicial;
	}

	public function getPesoProgreso()
	{
		return $this->pesoProgreso;
	}

	public function setPesoProgreso($pesoProgreso)
	{
		$this->pesoProgreso = $pesoProgreso;
	}

	public function getUrlFoto()
	{
		return $this->urlFoto;
	}

	public function setUrlFoto($urlFoto)
	{
		$this->urlFoto = $urlFoto;
	}

	public function getNombreSucursal()
	{
		return $this->nombreSucursal;
	}

	public function setNombreSucursal($nombreSucursal)
	{
		$this->nombreSucursal = $nombreSucursal;
	}

	public function getIdSucursal()
	{
		return $this->idSucursal;
	}

	public function setIdSucursal($idSucursal)
	{
		$this->idSucursal = $idSucursal;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

}
