<?php include(CONFIG['public_path'] . 'header.client.php'); ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("coach_info"));

// Verificar si hay suficientes partes
$email = $parts[0];
$name = $parts[1];
$last_name = $parts[2];
$image_path = $parts[3];
$phone = $parts[4];
?>
<div class="container">
    <div class="row justify-content-center px-5 py-3">
        <a href="<?= route('client', 'home') ?>" class="px-5">
            <img src="<?= CONFIG['assets'] ?>img/leave-arrow.svg" alt="imagen de volver atrás" style="height: 27px;">
        </a>
        <p class="h4 text-center">Información del coach</p>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <div class="form-group py-2">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" disabled>
                    </div>
                    <div class="form-group py-2">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name); ?>" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group py-2">
                        <label for="last_name">Apellido:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($last_name); ?>" disabled>
                    </div>
                    <div class="form-group py-2">
                        <label for="phone">Teléfono:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $phone; ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <label for="coach_image">Imagen del coach:</label>
                <img src="<?= CONFIG['assets'] ?><?= $image_path ?>" alt="Imagen de inicio" style="height: 300px;">
            </div>
            <div class="text-center">
                <a href="<?= route('client', 'home') ?>" class="btn btn-primary px-5">Volver</a>
            </div>
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