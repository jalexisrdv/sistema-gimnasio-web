<?php

if (isset($_POST['btnInsertar'])) {

require_once '../../models/daos/FechaImportanteDAO.php';
require_once '../../models/dtos/FechaImportanteDTO.php';
$fechaImportanteDAO = new FechaImportanteDAO();
$fechaImportanteDTO = new FechaImportanteDTO();

if(isset($_POST) && !empty($_POST)) {
$title= $_POST['title'];
$start = $_POST['start'];
$color = $_POST['color'];
$descripcion =$_POST['descripcion'];
$colorHexa;
if($color=="Suspencion"){
    $colorHexa="FF0000";
}else if($color=="Interno"){
    $colorHexa="0027FF";
    }
    else if($color=="Pago"){
        $colorHexa="B600FF";
    }
                
                $fechaImportanteDTO->setTitle($title);
                $fechaImportanteDTO->setStart($start);
                $fechaImportanteDTO->setColor($colorHexa);
                $fechaImportanteDTO->setDescripcion($descripcion);

                $realizoInsercion= $fechaImportanteDAO->insertarFechaImportante($fechaImportanteDTO);
                if($realizoInsercion == 1){
                    $_SESSION["mensajeInsercion"]="La insercion se realizo correctamente";
                    header('Location: index.php');
                } else {
                    $_SESSION["mensajeInsercion"]="Hubo un problema con la insercion, verifica tus datos";
                    header('Location: index.php');
                }

            }
}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vform.php';
require_once '../../includes/views/vfooter.php';