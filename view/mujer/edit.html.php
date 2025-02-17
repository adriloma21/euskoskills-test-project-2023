<?php
$id = $nombre = $apellidos = $nacimiento = $defuncion = $nacionalidad = $area = $enlace = $fotografia = $descripcion = "";
if(isset($dataToView["data"]['data']["id"])) $id = $dataToView["data"]['data']["id"];
if(isset($dataToView["data"]['data']["nombre"])) $nombre = $dataToView["data"]['data']["nombre"];
if(isset($dataToView["data"]['data']["apellidos"])) $apellidos = $dataToView["data"]['data']["apellidos"];
if(isset($dataToView["data"]['data']["nacimiento"])) $nacimiento = $dataToView["data"]['data']["nacimiento"];
if(isset($dataToView["data"]['data']["defuncion"])) $defuncion = $dataToView["data"]['data']["defuncion"];
if(isset($dataToView["data"]['data']["nacionalidad"])) $nacionalidad = $dataToView["data"]['data']["nacionalidad"];
if(isset($dataToView["data"]['data']["area"])) $area = $dataToView["data"]['data']["area"];
if(isset($dataToView["data"]['data']["enlace"])) $enlace = $dataToView["data"]['data']["enlace"];
if(isset($dataToView["data"]['data']["fotografia"])) $fotografia = $dataToView["data"]['data']["fotografia"];
if(isset($dataToView["data"]['data']["descripcion"])) $descripcion = $dataToView["data"]['data']["descripcion"];
?>
<div class="row">
    <?php if(isset($_GET["response"]) and $_GET["response"] === true): ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="index.php?controller=mujer&action=list">Volver al listado</a>
        </div>
    <?php endif; ?>
    <form class="form" action="index.php?controller=mujer&action=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
        </div>
        <div class="form-group">
            <label>Apellidos</label>
            <input class="form-control" type="text" name="apellidos" value="<?php echo $apellidos; ?>" />
        </div>
        <div class="form-group">
            <label>Año de Nacimiento</label>
            <input class="form-control" type="number" name="nacimiento" value="<?php echo $nacimiento; ?>" />
        </div>
        <div class="form-group">
            <label>Año de Defunción</label>
            <input class="form-control" type="number" name="defuncion" value="<?php echo $defuncion; ?>" />
        </div>
        <div class="form-group">
            <label>Nacionalidad</label>
            <input class="form-control" type="text" name="nacionalidad" value="<?php echo $nacionalidad; ?>" />
        </div>
        <div class="form-group">
            <label>Área</label>
            <input class="form-control" type="text" name="area" value="<?php echo $area; ?>" />
        </div>
        <div class="form-group">
            <label>Enlace</label>
            <input class="form-control" type="text" name="enlace" value="<?php echo $enlace; ?>" />
        </div>
        <div class="form-group">
            <label>Fotografía</label>
            <input class="form-control" type="text" name="fotografia" value="<?php echo $fotografia; ?>" />
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea class="form-control" name="descripcion"><?php echo $descripcion; ?></textarea>
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger" href="index.php?controller=mujer&action=list">Cancelar</a>
    </form>
</div>