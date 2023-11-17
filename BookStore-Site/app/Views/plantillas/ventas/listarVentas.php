<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Escucha el evento de cambio en el elemento de verificación
        $('.estadoventa').on('change', function () {
            // Obtiene el estado actual del elemento de verificación (marcado o desmarcado)
            var estado = $(this).is(':checked') ? 0 : 2;

            // Obtiene el ID de la consulta desde un atributo de datos en el elemento de verificación
            var idCabecera = $(this).data('id_cabecera');

            // Realiza la solicitud AJAX al controlador para actualizar el estado en la base de datos
            $.ajax({
                url: '<?php echo site_url("actualizarVenta"); ?>', // Reemplaza esto con la URL correcta de tu controlador y método PHP
                method: 'POST',
                data: { estado: estado, id_cabecera: idCabecera }, // Envía el estado y el ID de la consulta como datos de la solicitud
                success: function (response) {
                    console.log('ID de cabecera:', idCabecera);
                    console.log('Estado:', estado);
                },
                error: function (xhr, status, error) {
                    console.error('Error al actualizar el estado de venta:', error);
                }
            });
        });
    });
</script>


<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar ventas-->

<section class=" fondo Letra ">

    <div class="container Subtitulo color1 p30">
        
        <h1 class=" p30 "> Ventas </h1>

    </div>
    
    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <caption class=" Subtitulo2 ">Lista de ventas</caption>
                    <table class=" table table-dark table-bordered">

                        <thead class="thead-light">
                            <tr>

                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <!--    leer registros-->

                            <?php foreach ($datos as $dato): ?>

                                <tr>

                                    <td>
                                        <?= $dato['id_cabecera']; ?>
                                    </td>

                                    <td>

                                        <?= $dato['fecha_alta']; ?>
                                    </td>
                                    <td>
                                        <?= $dato['total']; ?>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input estadoventa" type="checkbox" value=""
                                                data-id_cabecera="<?= $dato['id_cabecera'] ?>" <?php if ($dato['estado'] == 1)
                                                      echo 'checked'; ?>>
                                            <label class="form-check-label" for="estadoventa"></label>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>