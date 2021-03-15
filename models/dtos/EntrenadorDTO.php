<?php

class EntrenadorDTO {

    private $id;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $fechaIngreso;
    private $nivelEntrenador;
    private $estatura;
    private $peso;
	private $urlFoto;
	private $horario;
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

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getFechaNacimiento(){
		return $this->fechaNacimiento;
	}

	public function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;
	}

	public function getFechaIngreso(){
		return $this->fechaIngreso;
	}

	public function setFechaIngreso($fechaIngreso){
		$this->fechaIngreso = $fechaIngreso;
	}

	public function getNivelEntrenador(){
		return $this->nivelEntrenador;
	}

	public function setNivelEntrenador($nivelEntrenador){
		$this->nivelEntrenador = $nivelEntrenador;
	}

	public function getEstatura(){
		return $this->estatura;
	}

	public function setEstatura($estatura){
		$this->estatura = $estatura;
	}

	public function getPeso(){
		return $this->peso;
	}

	public function setPeso($peso){
		$this->peso = $peso;
	}

	public function getUrlFoto(){
		return $this->urlFoto;
	}

	public function setUrlFoto($urlFoto){
		$this->urlFoto = $urlFoto;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function getNombreSucursal(){
		return $this->nombreSucursal;
	}

	public function setNombreSucursal($nombreSucursal){
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
