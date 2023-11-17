<!-- MENSAJES-->

<?php if (session('mensaje')) { ?>
   
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong></strong> <?=session('mensaje'); ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


 <!-- Pagina para agregar categoria-->
<section class=" fondo Letra">
   <div class="container p30">
       <div class="row">
           <div class=" cuadricula col-12 col-md-6">
               <h1 class="  Subtitulo color1 ">Librería Ramírez
               <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="40px" alt="logo">
               </h1>
            </div>
            <div class="cuadricula  formEdit  col-12 col-md-6">
               <!-- Pagina de registro -->
               
               <form method="post" action="<?=base_url('/actualizarCategoria')?>" enctype="multipart/form-data">
                   <!--sirve para actualizar la informacion y con la funcion hidden mantiene oculto el "id".--> 
<input type="hidden" name="id_categ" value="<?=$categorias['id_categ']?>">
               
               <div class=" container p30">
                       <h1 class="text-center  color1 p30 ">Modificar Categorias</h1>
                   </div>
                   <div class="form-group row justify-content-center  ">
                       <label for="descrpcion " class="editForm  ">Descripcion </label>

                        <div class=" ">
                            <input type="text" value="<?=$categorias['descripcion']?>" class="inputEdit-text form-control" name="descripcion" placeholder="descripcion de la categoria"required >
                        </div>
                   </div>
                   
                   <!-- BOTON GUARDAR-->                   
                   <div class="form-group row justify-content-center">
                       <div class=" text-center">
                           <button type="submit" class="btn editBoton text-dark text-center" name="">Guardar</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</section>