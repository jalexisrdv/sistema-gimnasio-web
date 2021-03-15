        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">RUTINAS</h2>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>EJERCICIOS</th>
                                <th>DURACIÓN</th>
                                <th>DIA</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ENTRENADOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rutinas as $rutina): ?>
                                <tr>
                                    <td><?php echo $rutina->getTipo(); ?></td>
                                    <td><?php echo $rutina->getEjercicios(); ?></td>
                                    <td><?php echo $rutina->getDuracion(); ?></td>
                                    <td><?php echo $rutina->getDia(); ?></td>
                                    <td><?php echo $rutina->getDescripcion(); ?></td>
                                    <td>
                                        <img src="<?php echo $rutina->getUrlFotoEntrenador() ?>" alt="foto" width="50" class="mr-3 rounded-circle height-perfil img-thumbnail shadow-sm">
                                        <?php echo $rutina->getNombreEntrenador(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>