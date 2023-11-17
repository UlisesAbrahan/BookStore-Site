<form action="<?= base_url('editarPerfil') ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="imagen">Imagen de perfil:</label>
    <input type="file" class="form-control" id="imagen" name="imagen">
  </div>
  <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>
