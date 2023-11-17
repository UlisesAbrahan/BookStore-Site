<?php if (session('mensaje')) { ?>
   
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong></strong> <?=session('mensaje'); ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<section class="fondo">

 <!-- migas de pan-->
 <div class="container p30 ">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('contacto') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Carrito</li>
      </ol>
    </nav>
  </div>
    <div class="container">
        
        
        <?php
        $session = session();
        $cart = \Config\Services::cart();
        $cartItems = $cart->contents();
        ?>

        <?php if (count($cartItems) > 0): ?>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Cod_prod</th>
                                    <th>Nombre</th>
                                    <th>PrecioUni</th>
                                    <th>Cantidad</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>$<?= $item['price']; ?></td>
                                        <td><?= $item['qty']; ?></td>
                                        

                                        
                                        <td>
                                            <a href="<?= base_url('eliminarElemento'.$item['rowid']) ?>" class="btn editBoton text-dark text-center">
                                                <img class="" src="<?php echo base_url() ?>assets/img/iconos/trash3-fill.svg" width="18px" alt="email">
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <div class="container cuadricula1">
                            <a href="<?php echo base_url('/cancelarCompra'); ?>" class="btn editBoton text-dark text-center">Cancelar carrito</a>
                            <a href="<?php echo base_url('/catalogo'); ?>" class="btn editBoton text-dark text-center">Seguir comprando</a>
                            <a href="<?php echo base_url('/confirmarCompra'); ?>" class="btn editBoton text-dark text-center">Confirmar compra</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p class="color1 Subtitulo2">No hay productos en el carrito.</p>
            <a href="<?php echo base_url('/catalogo'); ?>" class="btn editBoton text-dark text-center">Agregar al <img class="" src="<?php echo base_url() ?>assets/img/iconos/carrito.svg" width="18px" alt="email"></a>
        <?php endif; ?>
    </div>
</section>
