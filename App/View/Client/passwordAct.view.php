<?php include(CONFIG['public_path'] . 'header.client.php') ?>

<div class="container" style="height: 100%;">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <p class="h4 text-center">Actualizar contraseña</p>
            <form action="/AplicacionTCU/Client/updatePasswordClient" method="post" enctype="multipart/form-data">
                                <div class="form-group py-2">
                    <label for="last_name">Ingrese la contraseña actual: </label>
                    <input type="password" class="form-control" id="last_name" name="actual_password" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="last_name">Contraseña nueva: </label>
                    <input type="password" class="form-control" id="last_name" name="password" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="phone">Confirmar contraseña: </label>
                    <input type="password" class="form-control" id="phone" name="confirm" value="" required>
                </div>
                <div class="text-center form-group py-2">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_SESSION['redirect-info'])) : ?>
            Swal.fire({
                icon: '<?php echo $_SESSION['redirect-info']['type']; ?>',
                title: '<?php echo $_SESSION['redirect-info']['title']; ?>',
                text: '<?php echo $_SESSION['redirect-info']['text']; ?>',
                background: 'linear-gradient(to bottom, #011242, #001136)',
                color: '#fff',
                iconColor: '#fff',
                confirmButtonColor: '#3085d6'
            });
            <?php unset($_SESSION['redirect-info']); ?>
        <?php endif; ?>
    });
</script>