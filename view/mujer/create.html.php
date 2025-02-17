<form action="index.php?controller=mujer&action=create" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
    </div>
    <div class="form-group">
        <label for="nacimiento">Año de Nacimiento:</label>
        <input type="text" class="form-control" id="nacimiento" name="nacimiento" required>
    </div>
    <div class="form-group">
        <label for="defuncion">Año de Defunción:</label>
        <input type="text" class="form-control" id="defuncion" name="defuncion">
    </div>
    <div class="form-group">
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
    </div>
    <div class="form-group">
        <label for="area">Área:</label>
        <select class="form-control" id="area" name="area" required>
            <?php foreach ($dataToView['data']['areas'] as $area) { ?>
                <option value="<?php echo $area['id']; ?>"><?php echo $area['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="enlace">Enlace:</label>
        <input type="text" class="form-control" id="enlace" name="enlace">
    </div>
    <div class="form-group">
        <label for="fotografia">Fotografía:</label>
        <input type="file" class="form-control" id="fotografia" name="fotografia">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Crear Mujer</button>
</form>