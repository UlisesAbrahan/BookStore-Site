<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar Productos-->

<section class=" fondo Letra">
       <!-- migas de pan-->
       <div class="container p30 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('inicioAdmin') ?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>

    
    
    <div class="container p30">
        
        <div class="   ">

            <a class="Subtitulo color1 SacarDeco dropdown-toggle  " href="<?php echo base_url('/catalogo') ?>" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Productos
            </a>
            <ul class="dropdown-menu fondo1 " aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item color" href="<?php echo base_url('/agregarProductos1'); ?>"">Agregar producto
                    <img class="" src="<?php echo base_url() ?>assets/img/iconos/pen_2.svg" width="18px" alt="eliminar">
                    </a>
                </li>
                  <li>
                        <a class=" dropdown-item color" href="<?php echo base_url('/eliminados'); ?>">Ver productos
                        eliminados
                        <img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px" alt="eliminar">
                        </a>
                    </li>
              
            </ul>
        </div>
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
                    <caption class=" p10 ">Lista de productos activos</caption>
                    <table class="marginTop10 table table-dark table-bordered">

                        <thead class="thead-light">
                            <tr>
                                <th>Cod_libro</th>
                                <th>Nombre</th>
                                <th>Autor</th>
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

                            <?php foreach ($productos as $producto): ?>

                                <tr>
                                    <td>
                                        <?= $producto['id_prod']; ?>
                                    </td>
                                    <td>
                                        <?= $producto['nombre']; ?>
                                    </td>
                                    <td>
                                        <?= $producto['autor']; ?>
                                    </td>
                                    <td>
                                        <?= $producto['descripcion']; ?>
                                    </td>
                                   
                                    <td>
                                        $
                                        <?= $producto['precioUni']; ?>
                                    </td>
                                    <td>
                                        <?= $producto['stock']; ?>
                                    </td>

                                    <!--clase thumbnail=miniatura-->
                                    <td><img class="img-thumbnail"
                                            src="<?= base_url() ?>assets/img/productos/<?= $producto['imagen']; ?>"
                                            width="100" alt="">
                                    </td>


                                    <td>
                                        <?= $producto['id_categ']; ?>
                                    </td>

                                    <td>
                                        <!-- Boton editar producto-->
                                        <a href="<?= base_url('modificar/' . $producto['id_prod']); ?>"
                                            class="btn editBoton text-dark text-center"> <img class="" src="<?php echo base_url() ?>assets/img/iconos/editar.svg" width="18px" alt="email"></a>

                                        <!-- Boton borrar producto-->
                                        <a href="<?= base_url('borrar/' . $producto['id_prod']); ?>"
                                            class="btn editBoton text-dark text-center"> <img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px" alt="email"></a>
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