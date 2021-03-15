<?php
require_once '../../models/daos/FechaImportanteDAO.php';
require_once '../../models/dtos/FechaImportanteDTO.php';
$fechaImportanteDAO = new FechaImportanteDAO();
$fechaImportanteDTO = new FechaImportanteDTO();

$datosFecha=  $fechaImportanteDAO->obtenerFechaImportanteById($idFecha);

?>
<div class="container principal-content">
	<div class="row justify-content-center">
		<div class="col-12">
			 <div class="card">
                <div class="card-header">
                    <h2>Actualizacion de una fecha importante</h2>
                </div>
                <div class="card-body">
                	<form class="test" action="actualizar-fecha.php" method="POST" enctype="multipart/form-data">
                        
                     <input type="text" style="display:none" id="idF" name="idF" value="<?php echo $datosFecha->getId(); ?>" >
                    <div class="form-group mb-4">
							<label for="title">Asunto: </label><br />
							<input type="text" id="title" name="title" class="form-control" style="width:100%" placeholder="Asunto de la fecha importante" required 
                            value="<?php echo $datosFecha->getTitle(); ?>"></textarea>
						</div>

                        <div class="form-group mb-4">
							<label for="fecha">Fecha: </label>
							<input type="date" name="start" id="start" class="form-control" title="Fecha del asunto importante" placeholder="Fecha del asunto importante"
                            value="<?php echo $datosFecha->getStart(); ?>">
						</div>
						
                        <div class="form-group mb-4">
                            <label for="color">Tipo de importancia:</label>  
                            <select id="color" name="color" class="form-control" required>
                            <?php
                            if($datosFecha->getColor() == "#FF0000") {?>
                                <option value="Suspencion">Suspencion</option>
                                <option value="Interno" selected>Interno</option>
                                <option value="Pago">Pago</option>
                            <?php
                            } else if($datosFecha->getColor() == "#0027FF") { ?>
                                <option value="Suspencion">Suspencion</option>
                                <option value="Interno" selected>Interno</option>
                                <option value="Pago">Pago</option>
                            <?php
                            }else if($datosFecha->getColor() == "#B600FF") {?>
                                <option value="Suspencion">Suspencion</option>
                                <option value="Interno">Interno</option>
                                <option value="Pago" selected>Pago</option>
                            <?php
                            }else{?>
                                <option value="Suspencion">Suspencion</option>
                                <option value="Interno">Interno</option>
                                <option value="Pago">Pago</option>
                            <?php } ?>

                            </select>				
					    </div>
						  
                        <div class="form-group">
							<label for="descripcion">Descripci&oacute;n: </label><br />
							<textarea id="descripcion" name="descripcion" class="form-control" style="width:100%" placeholder="Descripci&oacute;n de la fecha importante" required>
                            <?php echo $datosFecha->getDescripcion();?>
                            </textarea>
						</div>
                        <br>
                        <div class="text-right">
                            <input type="submit" class="btn btn-info" name="btnInsertar" value="Actualizar Fecha Importante">
                        </div>

                    </form>     
					<?php 
                        if(isset($_SESSION["mensajeInsercion"])){
							$errmensaje = $_SESSION["mensajeInsercion"];
                            echo "<div class='alert alert-success mt-4'>
                            $errmensaje
                            </div>";
                            unset($_SESSION["mensajeInsercion"]);
                        }
                        //echo $idFecha;
                        
                    ?>          
    			</div>
    		</div>  
	    </div>
    </div>
</div>