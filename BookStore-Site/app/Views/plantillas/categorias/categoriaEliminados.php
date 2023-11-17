<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar Categorias inactivos-->

<section class=" fondo">
    <div class="container ">
        <h1 class="Subtitulo1 margin4 color1">Categorias de baja</h1>
    </div>

    <br>
    <br>


    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <caption class="">Lista de Categorias de baja</caption>
                    <table class="marginTop10 table table-dark table-bordered">

                        <thead class="thead-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody>


                            <!--    leer registros-->

                            <?php foreach ($datos as $dato): ?>

                                <tr>
                                    <td>
                                        <?= $dato['id_categ']; ?>
                                    </td>

                                    <td>
                                        <?= $dato['descripcion']; ?>
                                    </td>

                                    <td>
                                        <!-- Boton editar categoria-->
                                        <a href="<?= base_url('altaCategoria/' . $dato['id_categ']); ?>"
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