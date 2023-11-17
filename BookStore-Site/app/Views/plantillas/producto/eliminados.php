<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong></strong>
    <?= session('mensaje'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<!-- Seccion Listar Productos inactivos-->

<section class=" fondo Letra ">

<!-- migas de pan-->
<div class="container p30 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('inicioAdmin') ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('listar') ?>">Productos</a></li>
              
                <li class="breadcrumb-item active" aria-current="page">Bajas de productos</li>
            </ol>
        </nav>
    </div>
<div class="container p30">
<h1 class="Subtitulo1 color1">Productos inactivos</h1> 
</div>

<br>
<br>
<br>
<br>

<!-- Tablas-->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <caption class="">Lista de productos inactivos</caption>
                <table class="marginTop10 table table-dark table-bordered">

                    <thead class="thead-light">
                        <tr>
                            <th>Cod_prod</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>PrecioUni</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <!--    leer registros-->

                        <?php foreach ($datos as $dato): ?>

                            <tr>
                                <td>
                                    <?= $dato['id_prod']; ?>
                                </td>
                                <td>
                                    <?= $dato['nombre']; ?>
                                </td>
                                <td>
                                    <?= $dato['descripcion']; ?>
                                </td>
                                <td>
                                    $
                                    <?= $dato['precioUni']; ?>
                                </td>
                                <td>
                                    <?= $dato['stock']; ?>
                                </td>

                                <!--clase thumbnail=miniatura-->
                                <td><img class="img-thumbnail"
                                        src="<?= base_url() ?>assets/img/productos/<?= $dato['imagen']; ?>"
                                        width="100" alt="">
                                </td>


                                <td>
                                    <?= $dato['id_categ']; ?>
                                </td>

                                
                    <td>
                        <!-- Boton editar producto-->
                        <a href="<?= base_url('altaProd/' . $dato['id_prod']); ?>" class="btn editBoton text-dark text-center">Alta</a>

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










