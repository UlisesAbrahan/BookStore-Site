<!-- Pagina de contacto -->

<?php if (session('mensaje')) { ?>
   
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong></strong> <?=session('mensaje'); ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<section class=" fondo Letra ">

    <!-- migas de pan-->
    <div class="container p30 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('inicio') ?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </nav>
    </div>
    
    <div class="container  p30">
        <div class="row">
            <div class=" cuadricula col-12 col-md-6">
                <h1 class=" Subtitulo color1">Librería Ramirez
                <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="30px" alt="logo">
                </h1>

                
                <ul class=" color1 ">
                    <h3 class="Subtitulo2 alinear ">
                        <img class="formImg" src="<?php echo base_url() ?>assets/img/Iconos/person1.svg" width="30px" alt="">
                        Titular de la empresa: 
                        <span>Ramírez Patricia.</span>
                    </h3>
                    
                   
                    <h3 class="Subtitulo2 alinear ">
                        <img class="formImg" src="assets/img/Iconos/iphone.svg" width="30px" alt="">
                        Telefono:<span>3794-050388</span>
                    </h3>
                    <h3 class="Subtitulo2 alinear ">
                        <img class="formImg" src="assets/img/Iconos/pin_1.svg" width="30px" alt="">
                        Ubicacion:<span>Ambrosetti 552</span>
                    </h3>
                    <h3 class="Subtitulo2 alinear ">
                        <img class="formImg" src="assets/img/Iconos/mail.svg" width="30px" alt="">
                        Email:<span> LibreraRamirez@gmail.com</span>
                    </h3>
                </ul>
                <span class="editSpan2">SA Ramírez Librería</span>
            </div>
            
            <div class="cuadricula p30 formEdit fondoNegro col-12 col-md-6">
                
            <!-- Formulario de consulta -->
            <form action="<?=base_url('/guardarConsulta')?>" method="POST">
                    <div class=" container p30 ">
                        <h1 class="text-center Subtitulo color1 ">Dejanos tu consulta</h1>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="nombre" class="editForm">Ingrese su nombre</label>
                        <div class=" ">
                            <input type="text" class="inputEdit-text form-control" name="nombre" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="apellido" class="editForm">Ingrese su apellido</label>
                        <div class=" ">
                            <input type="text" class="inputEdit-text form-control" name="apellido" placeholder="Apellido" required>
                        </div>
                    </div>

                  <div class="form-group row justify-content-center ">
                        <label for="email" class="editForm">Ingrese su email</label>
                        <div class="">
                            <input type="email" class="inputEdit-text form-control" name="email" placeholder="email" required>
                        </div>
                    </div>  

                <div class="form-group row justify-content-center">
                        <label for="mensaje" class="editForm">Ingrese mensaje</label>
                        <div class="">
                            <textarea required placeholder="Escribe tu mensaje" class="inputEdit-text form-control" name="mensaje"
                                id="mensaje" cols="10" rows="3"></textarea>
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
    </div>
</section>