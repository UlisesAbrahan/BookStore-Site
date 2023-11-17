<!-- Seccion FACTURA-->

<?php if (session('mensaje')) { ?>
   
   <div class=" no-print  alert alert-warning alert-dismissible fade show" role="alert">
 <strong></strong> <?=session('mensaje'); ?>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<section class=" fondo Letra color1">
    <div class="container p30">
        <div class="Subtitulo cuadricula2">
             <h1 class="p30"> FACTURA </h1>
             <h5 class="  p30 centro Subtitulo2 ">Librería Ramírez
                <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="30px" alt="logo">
                </h5>

        </div>
    </div>

    

    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    
                    <table class=" table table-light table-bordered">

                   
        <tr>
            <th>Número de factura</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
        </tr>
        <tr>
            <td><?= $factura['id_cabecera']; ?></td>
            <td><?= $factura['fecha_alta']; ?></td>
            <td><?= $nombreUsuario; ?></td> <!-- Mostrar el nombre del usuario -->
            <td>$<?= $factura['total']; ?></td>
        </tr>
    </table>
    
    <h2>Detalle</h2>

    <div class="table-responsive">
                    
                    <table class=" table table-light table-bordered">
 
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
        
        </tr>

        <?php foreach ($detalle as $item): ?>
        <tr>
            <td><?= $item['nombre_producto']; ?></td> <!-- Mostrar el nombre del producto -->
            <td><?= $item['cantidad']; ?></td>
            <td><?= $item['precioUni']; ?></td>
        
        </tr>
    <?php endforeach; ?>
        
    </table>
<!-- Agregar botón para imprimir factura -->
<div class="container">
    <div class="row">
        <div class="col text-center">
            <button class="btn editBoton text-dark text-center btn-print" onclick="imprimirFactura()">Imprimir Factura</button>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</section>






</body>
</html>


<!-- JavaScript para imprimir la factura -->
<script>
    function imprimirFactura() {
        window.print(); // Imprimir la página actual
    }
</script>
