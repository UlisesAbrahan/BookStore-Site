<!-- Pagina de inicio del administrador -->


<!-- Seccion de registros-->


<?php if (session('mensaje')) { ?>

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error</strong>
    <?= session('mensaje'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>


<section class=" fondo Letra ">
  <div class="container pInicio">
    <div class="row">
      <div class=" cuadricula col-12 col-md-5">
        <h1 class="Subtitulo1  moverTitulo color1">Bienvenido

          <h4 class="card-text color1 ">Al panel de control del administrador .</h4>
      </div>

      <div class="cuadricula  formEdit col-12 col-md-7">

        <div class="card-body cuadricula  ">
          <img class="formImg  " src="<?php echo base_url() ?>assets/img/Iconos/person1.svg" width="80px" alt="">
          <h5 class="card-title color1">
            <?= session('nombre') . ' ' . session('apellido'); ?>
          </h5>

         

        </div>
      </div>
    </div>
  </div>
</section>