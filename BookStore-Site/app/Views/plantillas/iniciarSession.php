<!-- Pagina deinicio de session -->

<!-- session()->getFlashdata('mensaje') devuelve el valor almacenado en la variable de sesión 
 y luego lo elimina automáticamente. 
 Esto significa que el mensaje solo se mostrará una vez después de la redirección.-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong class="fondo"></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>



<section class=" fondo Letra ">

    <!-- migas de pan-->
    <div class="container p30 ">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('contacto') ?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inicio Session</li>
            </ol>
            </nav>
        </div>
        
        <div class="container ">
            <div class="row">
                <div class=" cuadricula col-12 col-md-6">
                    <h1 class="  Subtitulo color1 ">Librería Ramírez
                        <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="30px" alt="logo">
                    </h1>

                </div>

                <div class="cuadricula pInicio formEdit col-12 col-md-6">

                    <!-- Formulario de inicio de session -->

                    <form class="" action="<?= base_url('/login') ?>" method="POST">
                        <div class=" container p30">
                            <h1 class="text-center  color1 ">Inicio de Sessión</h1>
                        </div>

                        <div class="form-group row justify-content-center ">
                            <label for="email" class="">Ingrese su email</label>
                            <div class=" ">
                                <input type="email" class="inputEdit-text form-control" name="email"
                                    placeholder="Correo electronico" required>
                            </div>
                        </div>



                        <div class="form-group row justify-content-center ">
                            <label for="inputPassword3" class="">Ingrese contraseña</label>
                            <div class="">
                                <input type="password" class="inputEdit-text form-control" name="password"
                                    placeholder="Contraseña" required>
                            </div>
                        </div>



                        <div class="form-group row justify-content-center">
                            <div class=" text-center">
                                <button type="submit" class="btn editBoton text-dark text-center">Enviar</button>
                            </div>
                        </div>


                    </form>


                </div>

            </div>

        </div>
        
</section>