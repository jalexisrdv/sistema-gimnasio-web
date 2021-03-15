<?php

class FechaImportanteDTO {

    private $id;
    private $start;
	private $descripcion;
	private $title;
	private $color;
	private $fecha;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getStart(){
		return $this->start;
	}

	public function setStart($start){
		$this->start = $start;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getColor(){
		return $this->color;
	}

	public function setColor($color){
		$this->color = $color;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

}