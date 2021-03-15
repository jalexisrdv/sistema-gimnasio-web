        <main class="principal-content">
            <div class="form bg-white p-5">
                <form action="" method="post">
                    <h2 class="text-center mb-5">REGISTRO DE FACTURA</h2>
                    <div class="row">
                        <div class="col-md">
                            <label class="mb-3">FECHA DE PAGO REALIZADO</label>
                            <select name="fecha_pago_realizado" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="<?php echo $fechaActual; ?>"><?php echo $fechaActual; ?></option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="mb-3">FECHA DE CORTE DE PAGO</label>
                            <select name="fecha_corte_pago" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <?php for($i=1; $i<=5; $i++): ?>
                                    <?php 
                                        $mesFuturo = mktime(0, 0, 0, date("m") + $i, date("d"), date("Y"));
                                        $fecha = date('Y-m-d', $mesFuturo);
                                    ?>
                                    <option value="<?php echo $fecha; ?>"><?php echo $fecha; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">ID CLIENTE</label>
                            <input required name="id_cliente" type="text" pattern="[0-9]+" class="form-control mb-3" placeholder="INGRESAR NUMERO (ID CLIENTE)">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" href="insertar-pago.php" class="btn btn-info active" value="CREAR FACTURA">
                    </div>
                </form>
            </div>
        </main>