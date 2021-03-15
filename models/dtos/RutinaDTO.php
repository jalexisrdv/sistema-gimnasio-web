<?php

class RutinaDTO {

    private $id;
    private $tipo;
    private $ejercicios;
    private $duracion;
    private $dia;
	private $descripcion;
	private $idEntrenador;
	private $nombreEntrenador;
    private $urlFotoEntrenador;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getEjercicios(){
		return $this->ejercicios;
	}

	public function setEjercicios($ejercicios){
		$this->ejercicios = $ejercicios;
	}

	public function getDuracion(){
		return $this->duracion;
	}

	public function setDuracion($duracion){
		$this->duracion = $duracion;
	}

	public function getDia(){
		return $this->dia;
	}

	public function setDia($dia){
		$this->dia = $dia;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getNombreEntrenador(){
		return $this->nombreEntrenador;
	}

	public function setNombreEntrenador($nombreEntrenador){
		$this->nombreEntrenador = $nombreEntrenador;
	}

	public function getIdEntrenador()
	{
		return $this->idEntrenador;
	}

	public function setIdEntrenador($idEntrenador)
	{
		$this->idEntrenador = $idEntrenador;
	}

	public function getUrlFotoEntrenador()
	{
		return $this->urlFotoEntrenador;
	}

	public function setUrlFotoEntrenador($urlFotoEntrenador)
	{
		$this->urlFotoEntrenador = $urlFotoEntrenador;
	}

}