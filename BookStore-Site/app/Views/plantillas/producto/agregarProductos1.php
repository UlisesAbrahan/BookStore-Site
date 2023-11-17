<!-- MENSAJES-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong></strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Pagina para agregar productos-->
<section class=" fondo Letra">

    <!-- migas de pan-->
    <div class="container p30 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('inicioAdmin') ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('listar') ?>">Productos</a></li>

                <li class="breadcrumb-item active" aria-current="page">Agregar productos</li>
            </ol>
        </nav>
    </div>

     <!-- titulo-->
    <div class="container ">
        <div class="row">
            <div class=" cuadricula col-12 col-md-6">
                <h1 class="Subtitulo color1 ">Librería Ramírez
                    <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="20px" alt="logo">
                </h1>
            </div>


            <div class="cuadricula  formEdit p30 col-12 col-md-6">
                <!-- Pagina de registro -->

                <form method="post" action="<?= base_url('/guardarProducto') ?>" enctype="multipart/form-data">
                    <div class=" container p30 ">
                        <h1 class="text-center Subtitulo  color1  ">Agregar Producto</h1>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="nombre" class="editForm">Nombre

                        </label>
                        <div class=" ">
                            <input type="text" value="<?= old('nombre') ?>" class="inputEdit-text form-control"
                                name="nombre" placeholder="Nombre del producto" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="autor" class="editForm">Autor

                        </label>
                        <div class=" ">
                            <input type="text" value="<?= old('autor') ?>" class="inputEdit-text form-control"
                                name="autor" placeholder="Nombre del autor del libro " required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="descripcion" class="editForm">Descripcion</label>
                        <div class=" ">
                            <input type="text" class="inputEdit-text form-control" name="descripcion"
                                placeholder="Descripcion del libro" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="precioUni" class="editForm">Precio</label>
                        <div class=" ">
                            <input type="number" class="inputEdit-text form-control" name="precioUni"
                                placeholder="Precio por unidad  del libro" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="stock" class="editForm">Stock</label>
                        <div class=" ">
                            <input type="number" class="inputEdit-text form-control" name="stock"
                                placeholder="Stock del libro" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="id_categ" class="editForm">Categoria</label>
                        <select class="form-control" id="id_categ" name="id_categ" required>
                            <opcion class=" fondo1 " value="">Seleccionar categoria</opcion>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option class="fondo1" value="<?php echo $categoria['id_categ']; ?>"> <?php echo $categoria['descripcion']; ?> </opcion>
                                <?php } ?>

                        </select>
                    </div>

                    <div class="form-group row justify-content-center ">
                        <label for="imagen" class="editForm">Imagen</label>
                        <div class=" ">
                            <input type="file" class="inputEdit-text form-control" name="imagen"
                                placeholder="inserte una imagen" required>
                        </div>
                    </div>

                 <!-- Boton-->

                    <div class="form-group row justify-content-center">
                        <div class=" text-center">
                            <button type="submit" class="btn editBoton text-dark text-center"
                                name="registro">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>