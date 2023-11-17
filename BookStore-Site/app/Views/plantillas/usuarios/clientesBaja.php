<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar Clientes inactivos-->

<section class=" fondo Letra ">

    <div class="container p30 ">
        <h1 class="Subtitulo1 p30 color1">Clientes de baja</h1>
    </div>

    <br>
    <br>


    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <caption class="">Lista de clientes de baja</caption>
                    <table class="marginTop10 table table-dark table-bordered">

                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <!--    leer registros-->

                            <?php foreach ($usuarios as $usuario): ?>


                                <tr>

                                    <td>
                                        <?= $usuario['nombre']; ?>
                                    </td>
                                    <td>
                                        <?= $usuario['apellido']; ?>
                                    </td>
                                    <td>
                                        <?= $usuario['email']; ?>
                                    </td>
                                    <td>
                                        <!-- Boton Alta cliente-->
                                        <a href="<?= base_url('altaCliente/' . $usuario['id_usuario']); ?>"
                                            class="btn editBoton text-dark text-center">Alta</a>

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