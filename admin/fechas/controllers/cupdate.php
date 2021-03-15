<?php
if (isset($_POST['btnInsertar'])) {

    require_once '../../models/daos/FechaImportanteDAO.php';
    require_once '../../models/dtos/FechaImportanteDTO.php';
    $fechaImportanteDAO = new FechaImportanteDAO();
    $fechaImportanteDTO = new FechaImportanteDTO();
    
    if(isset($_POST) && !empty($_POST)) {
    $idFechaN= $_POST['idF'];
    $title= $_POST['title'];
    $start = $_POST['start'];
    $color = $_POST['color'];
    $descripcion =$_POST['descripcion'];
    $colorHexa;
    echo $descripcion;
    echo $color;
    if($color=="Suspencion"){
        $colorHexa="#FF0000";
    }else if($color=="#Interno"){
        $colorHexa="#0027FF";
        }
        else if($color=="Pago"){
            $colorHexa="#B600FF";
        }
                    $fechaImportanteDTO->setId($idFechaN);
                    $fechaImportanteDTO->setTitle($title);
                    $fechaImportanteDTO->setStart($start);
                    $fechaImportanteDTO->setColor($colorHexa);
                    $fechaImportanteDTO->setDescripcion($descripcion);
    
                    $realizoInsercion= $fechaImportanteDAO->actualizarFechaImportanteById($fechaImportanteDTO);
                    if($realizoInsercion == 1){
                        $_SESSION["mensajeInsercion"]="La insercion se realizo correctamente";
                        header('Location: ver-fechas.php');
                    } else {
                        $_SESSION["mensajeInsercion"]="Hubo un problema con la insercion, verifica tus datos";
                        header('Location: ver-fechas.php');
                    }
    
                }
    }
require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vupdate.php';
require_once '../../includes/views/vfooter.php';



    