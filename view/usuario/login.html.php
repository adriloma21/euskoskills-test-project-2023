<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <form action="index.php?controller=usuario&action=login" method="POST">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>