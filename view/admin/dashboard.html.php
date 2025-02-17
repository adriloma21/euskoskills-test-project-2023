<?php
if (isset($dataToView["data"]['mujeres']) && is_array($dataToView["data"]) && count($dataToView["data"]) > 0) {
?>
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="index.php?controller=mujer&action=create" class="btn btn-primary">Crear Mujer</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Fotografía</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Año de Nacimiento</th>
                        <th>Año de Defunción</th>
                        <?php if (!isset($_GET['area']) || $_GET['area'] == '') { ?>
                            <th>Área</th>
                        <?php } ?>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($dataToView["data"]['mujeres'] as $mujer) {
                        $fotografia = isset($mujer['fotografia']) ? 'recursos/images/' . $mujer['fotografia'] : '';
                        $nombre = isset($mujer['nombre']) ? $mujer['nombre'] : '';
                        $apellidos = isset($mujer['apellidos']) ? $mujer['apellidos'] : '';
                        $añoNacimiento = isset($mujer['nacimiento']) ? $mujer['nacimiento'] : '';
                        $añoDefuncion = isset($mujer['defuncion']) ? $mujer['defuncion'] : '';
                        $areaNombre = isset($mujer['area_nombre']) ? $mujer['area_nombre'] : '';
                        $nacionalidad = isset($mujer['nacionalidad']) ? $mujer['nacionalidad'] : '';
                        $enlace = isset($mujer['enlace']) ? $mujer['enlace'] : '';
                        $descripcion = isset($mujer['descripcion']) ? $mujer['descripcion'] : '';

                        $areaColors = [
                            'Filosofía' => 'bg-primary text-white',
                            'Matemáticas' => 'bg-success text-white',
                            'Astronomía' => 'bg-warning text-dark',
                            'Física' => 'bg-danger text-white',
                            'Literatura' => 'bg-info text-dark',
                            'Informática' => 'bg-dark text-white'
                        ];

                        $cardClass = isset($areaColors[$areaNombre]) ? $areaColors[$areaNombre] : 'bg-light';
                ?>
                    <tr class="<?php echo $cardClass; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-fotografia="<?php echo $fotografia; ?>"
                        data-nombre="<?php echo $nombre; ?>"
                        data-apellidos="<?php echo $apellidos; ?>"
                        data-nacimiento="<?php echo $añoNacimiento; ?>"
                        data-defuncion="<?php echo $añoDefuncion; ?>"
                        data-area="<?php echo $areaNombre; ?>"
                        data-nacionalidad="<?php echo $nacionalidad; ?>"
                        data-enlace="<?php echo $enlace; ?>"
                        data-descripcion="<?php echo $descripcion; ?>">
                        <td><img src="<?php echo $fotografia; ?>" class="img-fluid" alt="Imagen de <?php echo $nombre; ?>" style="width: 100px;"></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $apellidos; ?></td>
                        <td><?php echo $añoNacimiento; ?></td>
                        <td><?php echo $añoDefuncion; ?></td>
                        <?php if (!isset($_GET['area']) || $_GET['area'] == '') { ?>
                            <td><?php echo $areaNombre; ?></td>
                        <?php } ?>
                        <td>
                            <a href="index.php?controller=mujer&action=edit&id=<?php echo $mujer['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?controller=mujer&action=delete&id=<?php echo $mujer['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
?>
    <div class="alert alert-info">
        Actualmente no existen mujeres.
    </div>
<?php
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la Mujer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalFotografia" src="" class="img-fluid mb-3" alt="Fotografía">
                <p><strong>Nombre:</strong> <span id="modalNombre"></span></p>
                <p><strong>Apellido:</strong> <span id="modalApellido"></span></p>
                <p><strong>Año de Nacimiento:</strong> <span id="modalNacimiento"></span></p>
                <p><strong>Año de Defunción:</strong> <span id="modalDefuncion"></span></p>
                <p><strong>Nacionalidad:</strong> <span id="modalNacionalidad"></span></p>
                <p><strong>Área:</strong> <span id="modalArea"></span></p>
                <p><strong>Enlace:</strong> <a id="modalEnlace" href="" target="_blank">Ver más</a></p>
                <p><strong>Descripción:</strong> <span id="modalDescripcion"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var fotografia = button.getAttribute('data-fotografia');
        var nombre = button.getAttribute('data-nombre');
        var apellidos = button.getAttribute('data-apellidos');
        var nacimiento = button.getAttribute('data-nacimiento');
        var defuncion = button.getAttribute('data-defuncion');
        var area = button.getAttribute('data-area');
        var nacionalidad = button.getAttribute('data-nacionalidad');
        var enlace = button.getAttribute('data-enlace');
        var descripcion = button.getAttribute('data-descripcion');

        var modalFotografia = exampleModal.querySelector('#modalFotografia');
        var modalNombre = exampleModal.querySelector('#modalNombre');
        var modalApellido = exampleModal.querySelector('#modalApellido');
        var modalNacimiento = exampleModal.querySelector('#modalNacimiento');
        var modalDefuncion = exampleModal.querySelector('#modalDefuncion');
        var modalArea = exampleModal.querySelector('#modalArea');
        var modalNacionalidad = exampleModal.querySelector('#modalNacionalidad');
        var modalEnlace = exampleModal.querySelector('#modalEnlace');
        var modalDescripcion = exampleModal.querySelector('#modalDescripcion');

        modalFotografia.src = fotografia;
        modalNombre.textContent = nombre;
        modalApellido.textContent = apellidos;
        modalNacimiento.textContent = nacimiento;
        modalDefuncion.textContent = defuncion;
        modalArea.textContent = area;
        modalNacionalidad.textContent = nacionalidad;
        modalEnlace.href = enlace;
        modalDescripcion.textContent = descripcion;
    });
</script>