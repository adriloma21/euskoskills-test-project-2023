<div id="juego-container">
    <!-- Pantalla de inicio: solo se muestra el botón Iniciar -->
    <div id="start-screen">
        <button id="start-button" class="btn btn-primary">Iniciar</button>
    </div>

    <!-- Fase 1: Mostrar las mujeres a memorizar -->
    <div id="fase1" style="display: none;">
        <h2>Memoriza la información</h2>
        <div class="row">
            <?php foreach ($dataToView['data']['mujeres'] as $mujer) { ?>
                <div class="col-md-1">
                    <div class="card">
                        <img src="recursos/images/<?php echo $mujer['fotografia']; ?>" class="card-img-top" alt="<?php echo $mujer['nombre']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $mujer['nombre']; ?></h5>
                            <p class="card-text"><?php echo $mujer['area_nombre']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Fase 2: Asociación de cada mujer con su área -->
    <div id="fase2" style="display: none;">
        <h2>Asocia cada mujer con su área</h2>
        <form id="juego-form">
            <div class="row">
                <?php foreach ($dataToView['data']['mujeres'] as $mujer) { ?>
                    <div class="col-md-1">
                        <div class="card">
                            <img src="recursos/images/<?php echo $mujer['fotografia']; ?>" class="card-img-top" alt="<?php echo $mujer['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $mujer['nombre']; ?></h5>
                                <select name="area_<?php echo $mujer['id']; ?>" class="form-control">
                                    <?php foreach ($dataToView['data']['areas'] as $area) { ?>
                                        <option value="<?php echo $area['nombre']; ?>"><?php echo $area['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Pantalla de resultado -->
    <div id="resultado" style="display: none;">
        <h2>Resultado</h2>
        <p id="resultado-text"></p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var startButton = document.getElementById('start-button');

    startButton.addEventListener('click', function() {
        document.getElementById('start-screen').style.display = 'none';
        document.getElementById('fase1').style.display = 'block';
        
        setTimeout(function() {
            document.getElementById('fase1').style.display = 'none';
            document.getElementById('fase2').style.display = 'block';
        }, 10000);
    });

    document.getElementById('juego-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        var correctas = 0;
        var total = <?php echo count($dataToView['data']['mujeres']); ?>;
        <?php foreach ($dataToView['data']['mujeres'] as $mujer) { ?>
            if (formData.get('area_<?php echo $mujer['id']; ?>') === "<?php echo $mujer['area_nombre']; ?>") {
                correctas++;
            }
        <?php } ?>
        document.getElementById('fase2').style.display = 'none';
        document.getElementById('resultado').style.display = 'block';
        document.getElementById('resultado-text').innerText = 'Has acertado ' + correctas + ' de ' + total + ' mujeres.';
    });
});
</script>
