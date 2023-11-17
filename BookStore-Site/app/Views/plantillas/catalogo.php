<!-- mensajes -->
<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!--seccion catalogo-->

<section class=" fondo tamaño align-items-stretch  Letra">

    <!-- migas de pan-->
    <div class="container p30 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('inicio') ?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
            </ol>
        </nav>
    </div>

    <!-- boton ver carrito-->
    <div class="container moverTitulo p30 ">

        <?php $session = session(); ?>
        <?php if (session()->get('id_perfil') == 2): ?>
            <a href="<?php echo base_url('/carrito'); ?>" class="btn editBoton text-dark ">Ver <img class=""
                    src="<?php echo base_url() ?>assets/img/iconos/carrito.svg" width="18px" alt="email">
            </a>

        <?php endif; ?>
    </div>

    <!-- Tarjetas catalogo-->
    <div class="container">

        <?php $session = session(); ?>
        <?php helper(['form', 'url', 'cart']); ?>

        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="espaciadoT col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="cambiarTarj card">

                        <?php
                        echo form_open('agregarCarrito');
                        echo form_hidden('id', $producto['id_prod']);
                        echo form_hidden('price', $producto['precioUni']);
                        echo form_hidden('name', $producto['nombre']);
                        echo form_hidden('name', $producto['stock']);

                        ?>

                        <img src="<?= base_url('assets/img/productos/' . $producto['imagen']) ?>" class="card-img-top"
                            alt="Imagen del producto">
                        <div class=" p30 fondoTarj card-body">
                            <h5 class="card-title">
                                <?= $producto['nombre'] ?>
                            </h5>
                            <p class=" p30 color2 Subtitulo2 card-text">
                                <?= $producto['autor'] ?>
                            </p>

                            <p class="p30 Subtitulo3 card-text">$
                                <?= $producto['precioUni'] ?>
                            </p>
                            
                            <div class="accordion" id="accordionExample<?= $producto['id_prod'] ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne<?= $producto['id_prod'] ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne<?= $producto['id_prod'] ?>" aria-expanded="false"
                                            aria-controls="collapseOne<?= $producto['id_prod'] ?>">
                                            Ver descripción
                                        </button>
                                    </h2>
                                    <div id="collapseOne<?= $producto['id_prod'] ?>" class="accordion-collapse collapse justificado "
                                        aria-labelledby="headingOne<?= $producto['id_prod'] ?>"
                                        data-bs-parent="#accordionExample<?= $producto['id_prod'] ?>">
                                        <div class="accordion-body  ">
                                            <p class="card-text  ">
                                                <?= $producto['descripcion'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo form_close(); ?>
                            

                             <!-- solo muestra si el cliente está registrado en cada producto-->
                            <?php $session = session(); ?>
                            <?php if (session()->get('id_perfil') == 2): ?>
                                <button type="submit" class="btn editBoton text-dark text-center">
                                    <img class="" src="<?php echo base_url() ?>/assets/img/iconos/carrito.svg" width="20px"
                                        alt="">
                                </button>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>