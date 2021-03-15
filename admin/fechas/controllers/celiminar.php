<?php

if(isset($_GET) && !empty($_GET)) {
    $idFecha = $_GET['idfecha'];

    require_once '../../../models/daos/FechaImportanteDAO.php';
require_once '../../../models/dtos/FechaImportanteDTO.php';
$fechaImportanteDAO = new FechaImportanteDAO();
$fechaImportanteDTO = new FechaImportanteDTO();
    $eliminar = $fechaImportanteDAO->eliminarFechaImportanteById($idFecha);
    if(isset($eliminar) && !empty($eliminar)) {
        echo "Se realizo correctamente";
        header('Location: ../ver-fechas.php');
    }else{
        echo "No se realizo";
        header('Location: ../ver-fechas.php');
    }
}else{
    header('Location: ../ver-fechas.php');
}
?>