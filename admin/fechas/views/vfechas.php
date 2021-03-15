<main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">FECHAS IMPORTANTES</h2>
                    <a href="registrar-fecha.php" class="btn btn-info active mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        CREAR FECHA IMPORTANTE
                    </a>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID FECHA</th>
                                <th>FECHA</th>
                                <th>TITULO DE EVENTO</th>
                                <th>DESCRIPCION</th>
                                <th>COLOR</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($fechas as $fecha): ?>
                                <tr>
                                    <td><?php echo $fecha->getId(); ?></td>
                                    <td><?php echo $fecha->getStart(); ?></td>
                                    <td><?php echo $fecha->getTitle(); ?></td>
                                    <td><?php echo $fecha->getDescripcion();?></td>
                                    <td>
                                        <?php 
                                            if($fecha->getColor() == "#FF0000") {
                                                echo "Suspencion";
                                            } else if($fecha->getColor() == "#0027FF") {
                                                echo "Interno";
                                            }else if($fecha->getColor() == "#B600FF") {
                                                echo "Pago";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php $idfecha = $fecha->getId(); ?>
                                        <a href="actualizar-fecha.php?idfecha=<?php echo $idfecha;?>">
                                        <i class='fa fa-pencil fa-2x'></i>
                                        </a>
                                        <a href="controllers/celiminar.php?idfecha=<?php echo $idfecha;?>">
                                        <i class='fa fa-trash fa-2x text-danger'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>