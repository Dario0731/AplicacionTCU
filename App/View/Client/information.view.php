<?php include(CONFIG['public_path'] . 'header.client.php') ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("client_info"));

// Verificar si hay suficientes partes
$email = $parts[0];
$name = $parts[1];
$last_name = $parts[2];
$phone = $parts[3];
$birthdate = $parts[4];
?>
<div class="container" style="height: 100%;">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <p class="h4 text-center">Actualizar datos</p>
            <form action="/AplicacionTCU/Client/updatePersonalInfo" method="post" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"  value="<?= htmlspecialchars($email); ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name"  value="<?= htmlspecialchars($name); ?>"  required>
                </div>
                <div class="form-group py-2">
                    <label for="last_name">Apellido:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"  value="<?= htmlspecialchars($last_name); ?>"  required>
                </div>
                <div class="form-group py-2">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" class="form-control" id="phone" name="phone"  value="<?= htmlspecialchars($phone); ?>"  required>
                </div>
                <div class="form-group py-2">
                    <label for="birthdate">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate"  value="<?= htmlspecialchars($birthdate); ?>"  required>
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