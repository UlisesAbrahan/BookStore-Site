<!-- Seccion de registros-->

 <!-- mensaje -->
<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

 <!-- Nombre de la libreria-->
<section class=" fondo Letra">

    <!-- migas de pan-->
    <div class="container p30 ">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('contacto') ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
        </nav>
    </div>
    
        <div class="container p30 ">
            <div class="row ">
                <div class=" cuadricula col-12 col-md-6 ">
                    <h1 class=" Subtitulo  color1">Librería Ramírez
                        <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="30px" alt="logo">
                    </h1>

                </div>

                <div class="cuadricula  formEdit  col-12 col-md-6">


                    <!-- Pagina de registro -->

                    <form action="<?= base_url('/guardar') ?>" method="POST">
                        <div class=" container p30 ">
                            <h1 class="text-center  color1 ">Regístrate</h1>
                        </div>

                        <div class="form-group row justify-content-center ">
                            <label for="nombre" class="">Ingrese su nombre</label>
                            <div class=" ">
                                <input type="text" class="inputEdit-text form-control" name="nombre" placeholder="Nombre"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center ">
                            <label for="apellido" class="">Ingrese su apellido</label>
                            <div class=" ">
                                <input type="text" class="inputEdit-text form-control" name="apellido"
                                    placeholder="Apellido" required>
                            </div>
                        </div>


                        <div class="form-group row justify-content-center ">
                            <label for="email" class="">Ingrese su email</label>
                            <div class="">
                                <input type="email" class="inputEdit-text form-control" name="email" placeholder="Correo"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center ">
                            <label for="password" class="">Ingrese contraseña</label>
                            <div class="">
                                <input type="password" class="inputEdit-text form-control" name="password"
                                    placeholder="Contraseña" required>
                            </div>
                        </div>



                        <div class="form-group row justify-content-center">
                            <div class=" text-center">
                                <button type="submit" class="btn editBoton text-dark text-center"
                                    name="registro">Enviar</button>
                            </div>
                        </div>


                    </form>

                </div>

            </div>

        </div>
  </section>