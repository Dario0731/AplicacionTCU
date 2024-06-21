<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("coach_info"));

// Verificar si hay suficientes partes
if (count($parts) >= 5) {
    $email = $parts[0];
    $name = $parts[1];
    $last_name = $parts[2];
    $image_path = $parts[3];
    $phone = $parts[4];
    $conection = $parts[5];
} else {
    // Si no hay suficientes partes, asignar valores predeterminados
    $email = $parts[0];
    $name = $parts[1];
    $last_name = $parts[2];
    $image_path = "NO";
    $phone = $parts[4];
    $conection = $parts[5];
}
?>
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-6">
            <?php if ($conection == 0) { ?>
                <p class="h3 text-center">Terminemos de configurar tus datos</p>
            <?php } else { ?>
                <p class="h3 text-center">Actualizar datos</p>
            <?php } ?>
            <form action="/AplicacionTCU/Admin/updateCoachInfo" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name); ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="phone">Teléfono:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($phone); ?>" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="last_name">Apellido:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($last_name); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group py-2 text-center">
                    <label for="image">Imagen:</label>
                    <div><input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="onFileSelected(event)"></div>
                    <input type="hidden" id="image_path" name="image_path">
                </div>
                <?php if ($image_path != "") : ?>
                    <div class="text-center py-2 justify-content-center">
                        <label for="image">Imagen actual:</label>
                        <img src="<?= CONFIG['assets'] . $image_path ?>" alt="Imagen de inicio" style="height: 350px;">
                    </div>
                <?php endif; ?>


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

    function onFileSelected(event) {
        var file = event.target.files[0];
        var formData = new FormData();
        formData.append('image', file);

        fetch('/AplicacionTCU/Admin/onFileSelected', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        }).then(response => {
            return response.text().then(text => {
                console.log('Response text:', text); // Para ver la respuesta cruda
                try {
                    return JSON.parse(text);
                } catch (error) {
                    throw new Error('Invalid JSON: ' + text);
                }
            });
        }).then(data => {
            if (data.success) {
                console.log('File uploaded successfully');
                document.getElementById('image_path').value = data.path; // Guardar la ruta de la imagen en un campo oculto
            } else {
                console.error('Error uploading file: ' + data.message);
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    }
</script>