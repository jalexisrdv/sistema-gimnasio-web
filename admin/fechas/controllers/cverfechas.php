<?php
    require_once '../../models/daos/FechaImportanteDAO.php';
    require_once '../../models/dtos/FechaImportanteDTO.php';
    
    $fechaImportanteDAO = new FechaImportanteDAO();
    $fechas=$fechaImportanteDAO->obtenerFechasImportantes();

    require_once '../../includes/views/vheader.php';
    require_once '../../includes/views/vnavbar.php';
    require_once 'views/vfechas.php';
    require_once '../../includes/views/vfooter.php';

?>