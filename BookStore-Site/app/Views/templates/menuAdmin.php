<!-- Seccion nabvar -->
<header class="Letra">

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
        <ul class="navbar-nav d-flex justify-content-center align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('inicioAdmin') ?>">Inicio</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?php echo base_url('listar') ?>"
              role="button" aria-expanded="false">Producto</a>
            <ul class="dropdown-menu fondo1 color1">
              <li><a class="dropdown-item" href="<?php echo base_url('/listar') ?>">Ver Productos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('categorias') ?>">Categorias</a></li>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('listarConsulta') ?>">consultas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('ventas') ?>">ventas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('listarClientes') ?>">Clientes</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo base_url('/catalogo') ?>" id="navbarDropdown"
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="" src="<?php echo base_url() ?>assets/img/iconos/person1.svg" width="18px" alt="email">
              <?= session('email'); ?>
            </a>
            <ul class="dropdown-menu fondo1 color1">
              <li><a class="dropdown-item  " href="<?php echo base_url('/salir') ?>">
                  <img class="" src="<?php echo base_url() ?>assets/img/iconos/cerrar.svg" width="15px" alt="cerrar">
                  Salir </a>
              </li>


            </ul>
          </li>




        </ul>
      </div>
    </div>
  </nav>
</header>