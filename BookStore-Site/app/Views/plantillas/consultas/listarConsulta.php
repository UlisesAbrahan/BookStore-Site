<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Escucha el evento de cambio en el elemento de verificación
  $('.estadoConsulta').on('change', function() {
    // Obtiene el estado actual del elemento de verificación (marcado o desmarcado)
    var estado = $(this).is(':checked') ? 0 : 2;
    
    // Obtiene el ID de la consulta desde un atributo de datos en el elemento de verificación
    var id_consulta = $(this).data('id_consulta');
    
    // Realiza la solicitud AJAX al controlador para actualizar el estado en la base de datos
    $.ajax({
      url: '<?php echo site_url("actualizarConsulta"); ?>', // Reemplaza esto con la URL correcta de tu controlador y método PHP
      method: 'POST',
      data: { estado: estado, id_consulta: id_consulta }, // Envía el estado y el ID de la consulta como datos de la solicitud
      success: function(response) {
        console.log('ID de consulta:', id_consulta);
console.log('Estado:', estado);



      },
      error: function(xhr, status, error) {
        console.error('Error al actualizar el estado de consulta:', error);
      }
    });
  });
});
</script>





<!-- Mensaje-->

<?php if (session('mensaje')) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong>
        <?= session('mensaje'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<!-- Seccion Listar consultas-->

<section class=" fondo Letra ">
    <div class="container Subtitulo color1 p30">
        
        <h1 class=" p30 "> Consultas </h1>
    
    </div>
    
    <!-- Tablas-->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <caption class=" Subtitulo2 ">Lista de consultas</caption>
                    <table class="table table-dark table-bordered">

                        <thead class="thead-light">
                            <tr>
                               
                                <th>nombre</th>
                                <th>email</th>
                                <th>mensaje</th>
                                <th>fecha</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <!--    leer registros-->

                            <?php foreach ($datos as $dato): ?>

                                <tr>
                                    
                                    <td>
                                        <?= $dato['nombre']; ?>
                                    </td>
                                  
                                    <td>
                                        $
                                        <?= $dato['email']; ?>
                                    </td>
                                    <td>
                                        <?= $dato['mensaje']; ?>
                                    </td>
                                 
                                    <td>
                                        <?= $dato['fecha_alta']; ?>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input estadoConsulta" type="checkbox" value="" data-id_consulta="<?= $dato['id_consulta'] ?>"  <?php if ($dato['estado'] == 1) echo 'checked'; ?>>
                                            <label class="form-check-label" for="estadoConsulta"></label>
                                        </div>
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