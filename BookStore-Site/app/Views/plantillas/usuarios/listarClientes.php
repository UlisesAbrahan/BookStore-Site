<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar Clientes-->

<section class=" fondo Letra ">
    <div class="container p30 ">
        <div class="Subtitulo p30 ">

            <a class=" color1 SacarDeco dropdown-toggle  " href="<?php echo base_url('/catalogo') ?>"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Clientes
            </a>
            <ul class="dropdown-menu fondo1 " aria-labelledby="navbarDropdown">
                <li>
                    <a class=" dropdown-item " href="<?php echo base_url('/clientesBaja'); ?>">Ver Clientes de baja
                        <img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px"
                            alt="eliminar">
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <br>
    <br>


    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <caption class="">Lista de clientes activos</caption>
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


                                        <!-- Boton borrar producto-->
                                        <a href="<?= base_url('borrarClientes/' . $usuario['id_usuario']); ?>"
                                            class="btn editBoton text-dark text-center"> <img class=""
                                                src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px"
                                                alt="email"></a>
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