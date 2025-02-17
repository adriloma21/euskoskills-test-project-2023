<?php
$mujer = $dataToView["data"];
?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <h2>Datos bodega</h2>
            <div class="d-flex">
                <a href="index.php?controller=bodega&action=edit&id=<?php echo $bodega['id']; ?>" class="btn btn-warning me-2">Editar</a>
                <a href="index.php?" class="btn btn-secondary me-2">Volver</a>
                <a href="index.php?controller=bodega&action=delete&id=<?php echo $bodega['id']; ?>" class="btn btn-danger">Borrar</a>
            </div>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" value="<?php echo $bodega["nombre"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" class="form-control" value="<?php echo $bodega["direccion"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" value="<?php echo $bodega["email"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" value="<?php echo $bodega["telefono"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>Persona de contacto</label>
            <input type="text" class="form-control" value="<?php echo $bodega["persona_contacto"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>Año de fundación</label>
            <input type="text" class="form-control" value="<?php echo $bodega["año_fundacion"]; ?>" readonly />
        </div>
        <div class="form-group">
            <label>¿Dispone de restaurante?</label>
            <div>
                <label><input type="radio" <?php echo $bodega["disponibilidad_restaurante"] ? 'checked' : ''; ?> disabled> Sí</label>
                <label><input type="radio" <?php echo !$bodega["disponibilidad_restaurante"] ? 'checked' : ''; ?> disabled> No</label>
            </div>
        </div>
        <div class="form-group">
            <label>¿Dispone de hotel?</label>
            <div>
                <label><input type="radio" <?php echo $bodega["disponibilidad_hotel"] ? 'checked' : ''; ?> disabled> Sí</label>
                <label><input type="radio" <?php echo !$bodega["disponibilidad_hotel"] ? 'checked' : ''; ?> disabled> No</label>
            </div>
        </div>
    </div>

    <a href="index.php?controller=vino&action=list&id=<?php echo $bodega['id']; ?>" class="btn btn-primary" onclick="saveBodegaId(<?php echo $bodega['id']; ?>)">Ver Vinos</a>

    <script>
        function saveBodegaId(id) {
            sessionStorage.setItem('id_bodega', id);
        }
    </script>
</div>