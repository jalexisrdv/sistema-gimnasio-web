        <main class="principal-content">
            <div class="form bg-white p-5">
                <form action="asignar-rutina.php" method="post">
                    <h2 class="text-center mb-5">GESTIONAR RUTINAS DE CLIENTE</h2>
                    <div class="row d-none">
                        <div class="col-md">
                            <input type="text" name="id_cliente" id="id_cliente" class="form-control mb-3" placeholder="id_cliente" value="<?php echo !(empty($_POST)) ? $_POST['id_cliente'] : "" ?>">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md mb-5">
                            <img src="<?php echo $cliente->getUrlFoto() ?>" alt="foto" width="100" class="mr-3 rounded-circle height-perfil-100 img-thumbnail shadow-sm">
                            <p><?php echo $cliente->getNombre(); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <?php require_once 'vrutinas-cliente.php'; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="id_rutina" class="mb-3 mt-5">TIPOS DE RUTINAS*</label>
                            <select id="id_rutina" name="id_rutina" class="form-select mb-3" aria-label=".form-select-lg">
                                <?php foreach($rutinas as $rutina): ?>
                                    <?php $idRutina = $rutina->getId() ?>
                                    <?php $tipoRutina = $rutina->getTipo() ?>
                                    <?php $ejerciciosRutina = $rutina->getEjercicios() ?>
                                    <option value="<?php echo $idRutina ?>"><?php echo $tipoRutina . " - " . $ejerciciosRutina ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-info active" value="ASIGNAR RUTINA">
                    </div>
                    <?php
                        if(!empty($exitoMsj)) {
                            echo "
                                <div class='row mt-3'>
                                    <div class='alert alert-success'>
                                        $exitoMsj
                                    </div>
                                </div>
                            ";
                        }
                    ?>
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