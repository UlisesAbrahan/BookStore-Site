<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong></strong>
    <?= session('mensaje'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<!-- Seccion Categorias de los Productos-->

<section class=" fondo">
<div class="container p30 ">

<div class="Subtitulo p30 ">

        <a class=" color1 SacarDeco dropdown-toggle  " href="<?php echo base_url('/catalogo') ?>" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias productos
        </a>
        <ul class="dropdown-menu fondo1 " aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item " href="<?php echo base_url('/agregarCategoria'); ?>"">Agregar categorias
                </a>
            </li>
              <li>
                    <a class=" dropdown-item " href="<?php echo base_url('/cateEliminado'); ?>">Ver categorias
                    eliminadas
                    <img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px" alt="eliminar">
                    </a>
                </li>
          
        </ul>
    </div>

    
 </div>


<!-- Tablas-->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <caption>Lista de categorias activas</caption>
                <table class="table marginTop10 table-dark table-bordered">

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
                                    <a href="<?= base_url('modificarCategoria/' . $dato['id_categ']); ?>"
                                        class="btn editBoton text-dark text-center"><img class="" src="<?php echo base_url() ?>assets/img/iconos/editar.svg" width="18px" alt="email"></a>

                                    <!-- Boton para baja de categoria-->
                                    <a href="#" data-href= "<?= base_url('bajaCategoria/' . $dato['id_categ']); ?>"
                                    data-bs-toggle="modal"  data-bs-target="#modal-confirma"  data-placement="top" title="Eliminar registro"class="btn editBoton text-dark text-center"><img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px" alt="email"></a>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
   <p>¿Desea eliminar este registro? </P>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
    <a href="<?= base_url('bajaCategoria/' . $dato['id_categ']); ?>" class="btn btn-primary btn-ok" >Si </a>
  </div>
</div>
</div>
</div>