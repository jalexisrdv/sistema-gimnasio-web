<?php
header('Content-Type: application/json');
require_once '../../models/daos/Conexion.php';
$pdo=Conexion::getConexion();

//Sentencia SQL
$sentenciaSQL= $pdo->prepare("SELECT * FROM fechas_importantes");
$sentenciaSQL->execute();

$resultado=$sentenciaSQL->fetchAll();
echo json_encode($resultado);
?>