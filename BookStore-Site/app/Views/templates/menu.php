<!-- Seccion nabvar -->
<header class="no-print ">
  <!-- Seccion menu-->
  <nav class="Letra navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-toggler">

        <a class="navbar-brand" href="<?php echo base_url('inicio') ?>">
          <img src="<?php echo base_url('assets/img/logos/logo.png') ?>" width="50px" alt="Logo">
        </a>

        <ul class="navbar-nav d-flex  ">

          <li class="nav-item">
            <a class="nav-link active   " aria-current="page" href="<?php echo base_url('inicio') ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="<?php echo base_url('quienesSomos') ?>">Quienes Somos</a>
          </li>
          <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url('/catalogo') ?>" id="navbarDropdown"
    role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Catalogo
</a>
<ul class="dropdown-menu fondo1 " aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="<?php echo base_url('/catalogo/1') ?>">Cuentos infantiles</a></li>
    <li><a class="dropdown-item" href="<?php echo base_url('/catalogo/2') ?>">Ciencia Ficción y de Terror</a></li>
    <li><a class="dropdown-item" href="<?php echo base_url('/catalogo/3') ?>">Otros</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="<?php echo base_url('/catalogo') ?>">Ver todo</a></li>
</ul>

          </li>
          <li class="nav-item">
            <a class="nav-link  " href="<?php echo base_url('comercializacion') ?>">Comercializacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link   " href="<?php echo base_url('terminosUsos') ?>">Terminos</a>
          </li>

        

            <?php if (session()->get('id_perfil') != 2): ?>
              <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('contacto') ?>">Contacto</a>
            </li>
          <li class="nav-item">
              <a class="nav-link  " href="<?php echo base_url('registro') ?>">Registro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link 
               " href="<?php echo base_url('inicioSession') ?>">Inicio Sesión</a>
            </li>
            <?php endif; ?>

          <!-- Para que muestre a un usuario registrado -->
          <?php if (session()->get('id_perfil') == 2): ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('consultas') ?>">Consultas</a>
            </li>
            
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url('/catalogo') ?>" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="" src="<?php echo base_url() ?>assets/img/iconos/person1.svg" width="18px" alt="email">
                <?= session('email'); ?>
              </a>
              <ul class="dropdown-menu fondo1 " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item " href="<?php echo base_url('/carrito') ?>">
                <img class=""
src="<?php echo base_url() ?>/assets/img/iconos/carrito.svg" width="20px" alt=""> Carrito</a></li>

                <li>
                  <hr class="dropdown-divider">
                  <a class="dropdown-item " href="<?php echo base_url('/salir') ?>">
                  <img class="" src="<?php echo base_url() ?>assets/img/iconos/cerrar.svg" width="15px" alt=""> Salir</a>
                 
                </li>
               
              </ul>
            </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>