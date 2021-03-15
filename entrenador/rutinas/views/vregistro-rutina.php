        <main class="principal-content">
            <div class="form bg-white p-5">
                <form action="<?php echo !empty($_GET) ? "modificar-rutina.php" : "registro-rutina.php" ?>" method="post">
                    <h2 class="text-center mb-5">REGISTRO DE RUTINA</h2>
                    <div class="row d-none">
                        <div class="col-md">
                            <input type="text" name="id" id="id" class="form-control mb-3" placeholder="id" value="<?php echo !(empty($_POST)) ? $_POST['id'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="tipo" class="mb-3">TIPO*</label>
                            <input required type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,45}" name="tipo" id="tipo" class="form-control mb-3" placeholder="TIPO" value="<?php echo !(empty($_POST)) ? $_POST['tipo'] : "" ?>">
                        </div>
                        <div class="col-md">
                            <label for="duracion" class="mb-3">DURACIÓN*</label>
                            <input required type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9]{1,45}" name="duracion" id="duracion" class="form-control mb-3" placeholder="DURACIÓN" value="<?php echo !(empty($_POST)) ? $_POST['duracion'] : "" ?>">
                        </div>
                        <div class="col-md">
                            <label for="dia" class="mb-3">DIA(S)*</label>
                            <input required type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{1,45}" name="dia" id="dia" class="form-control mb-3" placeholder="DIA(S)" value="<?php echo !(empty($_POST)) ? $_POST['dia'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="ejercicios" class="mb-3">EJERCICIOS*</label>
                            <textarea required type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{1,600}" name="ejercicios" id="ejercicios" class="form-control mb-3" placeholder="EJERCICIOS" rows="3">
                                <?php echo !(empty($_POST)) ? $_POST['ejercicios'] : "" ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="descripcion" class="mb-3">DESCRIPCIÓN*</label>
                            <textarea required name="descripcion" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{1,600}" id="descripcion" rows="3" class="form-control mb-3" placeholder="DESCRIPCIÓN">
                                <?php echo !(empty($_POST)) ? $_POST['descripcion'] : "" ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-info active" value="<?php echo !empty($_GET) ? "MODIFICAR RUTINA" : "REGISTRAR RUTINA" ?>">
                    </div>
                    <?php
                        if(!empty($errorMsj)) {
                            echo "
                                <div class='row mt-3'>
                                    <div class='alert alert-danger'>
                                        $errorMsj
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </form>
            </div>
        </main>