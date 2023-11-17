



 <!-- MENSAJES-->

 <?php if (session('mensaje')) { ?>
   
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong></strong> <?=session('mensaje'); ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


 <!-- Pagina para modificar productos-->
<section class=" fondo Letra ">
   <div class="container p30 ">
       <div class="row">
           <div class=" cuadricula p30 col-12 col-md-6 color1 ">
               <h1 class=" Subtitulo1 p30 ">Librería Ramírez
               <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="40px" alt="logo">
               </h1>
            </div>
            <div class="cuadricula p30 formEdit fondo col-12 col-md-6">
               
            
            <!-- Pagina para modificar -->
               
               <form method="post" action="<?=base_url('/actualizar')?>" enctype="multipart/form-data">
               <!--sirve para actualizar la informacion y con la funcion hidden mantiene oculto el "id".--> 
<input type="hidden" name="id_prod" value="<?=$producto['id_prod']?>">
                   <div class=" container ">
                       <h1 class="text-center h1Form color1 p30 ">Modificar Producto</h1>
                   </div>
                   <div class="form-group row justify-content-center ">
                       <label for="nombre" class="editForm">Nombre

        
                        <div class=" ">
                        <input id="nombre" value="<?=$producto['nombre']?>" class="form-control" type="text" name="nombre">
                        </div>
                   </div>
                   
                   <div class="form-group row justify-content-center ">
                       <label for="descripcion" class="editForm">Descripcion</label>
                       <div class=" ">
                       <input id="descripcion" value="<?=$producto['descripcion']?>"  class="form-control" type="text" name="descripcion">
                       </div>
                   </div>
                   
                   <div class="form-group row justify-content-center ">
                       <label for="precioUni" class="editForm">Precio</label>
                       <div class=" ">
                       <input id="precioUni" value="<?=$producto['precioUni']?>"  class="form-control" type="text" name="precioUni">
                       </div>
                   </div>

                   <div class="form-group row justify-content-center ">
                       <label for="stock" class="editForm">Stock</label>
                       <div class=" ">
                       <input id="stock" value="<?=$producto['stock']?>"  class="form-control" type="text" name="stock">
                       </div>
                   </div>


                   <div class="form-group row justify-content-center ">
                       <label for="id_categ" class="editForm">Seleccione categoria</label>

                       <select class="form-control" id="id_categ" name="id_categ"required>
                       <opcion value="">Seleccionar categoria</opcion>
                       <?php foreach($categorias as $categoria) {?>
      <option value="<?php echo $categoria['id_categ'];?>"> <?php echo $categoria['descripcion']; ?>  </opcion> 
                      <?php } ?>
                    
                    </select> 
                      
                   </div>

                   <div class="form-group row justify-content-center ">
                       <label for="imagen" class="editForm">Imagen</label>
                       <div class=" ">
                       <img class="img-thumbnail" src="<?=base_url()?>assets/img/productos/<?=$producto['imagen'];  ?>" width="100" alt="">
                       <input id="imagen" class="form-control-file" type="file" name="imagen">
                    </div>
                   </div>

                  
                   
                   <div class="form-group row justify-content-center">
                       <div class=" text-center">
                           <button type="submit" class="btn editBoton text-dark text-center" name="registro">Modificar</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</section>
