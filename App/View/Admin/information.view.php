<?php include(CONFIG['public_path'].'header.admin.php'); ?>

<div class="container">
    <div class="row justify-content-center pt-5" style="height: 80%;">
        <div class="col-md-6">
            <form action="process_form.php" method="post" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email']; ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $_SESSION['user']['name']; ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="last_name">Apellido:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="image">Imagen:</label>
                    <div><input type="file" class="form-control-file" id="image" name="image" accept="image/*" required></div>
                </div>
                <div class="form-group py-2">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>