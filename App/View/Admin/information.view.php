<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("coach_info"));

// Verificar si hay suficientes partes
if (count($parts) >= 4) {
    $email = $parts[0];
    $name = $parts[1];
    $last_name = $parts[2];
    // $image_path = $parts[3];
    $phone = $parts[3];
    $conection = $parts[4];
} else {
    // Si no hay suficientes partes, asignar valores predeterminados
    $email = '';
    $name = '';
    $last_name = '';
    $image_path = '';
    $phone = '';
}
?>
<div class="container">
    <div class="row justify-content-center pt-5" style="height: 80%;">
        <div class="col-md-6">
            <?php if ($conection == 0) : ?>
                <p>Terminemos de configurar tus datos: </p>
            <?php endif; ?>
            <form action="/AplicacionTCU/Admin/updateCoachInfo" method="post" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name); ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="last_name">Apellido:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($last_name); ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="image">Imagen:</label>
                    <div><input type="file" class="form-control-file" id="image" name="image" accept="image/*"></div>
                    <?php if (!empty($image_path)) : ?>
                        <img src="<?= htmlspecialchars($image_path); ?>" alt="Coach Image" style="max-width: 100px; max-height: 100px;">
                    <?php endif; ?>
                </div>
                <div class="form-group py-2">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($phone); ?>" required>
                </div>
                <div class="text-center form-group py-2">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
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