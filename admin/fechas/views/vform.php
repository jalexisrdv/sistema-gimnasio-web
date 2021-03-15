<div class="container principal-content">
	<div class="row justify-content-center">
		<div class="col-12">
			 <div class="card">
                <div class="card-header">
                    <h2>Registro de una fecha importante</h2>
                </div>
                <div class="card-body">
                	<form class="test" action="registrar-fecha.php" method="POST" enctype="multipart/form-data">
                        
                    <div class="form-group mb-4">
							<label for="title">Asunto: </label><br />
							<input type="text" id="title" name="title" class="form-control" style="width:100%" placeholder="Asunto de la fecha importante" required></textarea>
						</div>

                        <div class="form-group mb-4">
							<label for="fecha">Fecha: </label>
							<input type="date" name="start" id="start" class="form-control" title="Fecha del asunto importante" placeholder="Fecha del asunto importante">
						</div>
						
                        <div class="form-group mb-4">
                            <label for="color">Tipo de importancia:</label>  
                            <select id="color" name="color" class="form-control" required>
                                <option value="Suspencion">Suspencion</option>
                                <option value="Interno">Interno</option>
                                <option value="Pago">Pago</option>
                            </select>				
					    </div>
						  
                        <div class="form-group">
							<label for="descripcion">Descripci&oacute;n: </label><br />
							<textarea id="descripcion" name="descripcion" class="form-control" style="width:100%" placeholder="Descripci&oacute;n de la fecha importante" required></textarea>
						</div>
                        <br>
                        <div class="text-right">
                            <input type="submit" class="btn btn-info" name="btnInsertar" value="Agregar Fecha Importante">
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
                    ?>          
    			</div>
    		</div>  
	    </div>
    </div>
</div>