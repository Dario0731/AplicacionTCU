<?php include(CONFIG['public_path'] . 'header.client.php') ?>

<div class="container" style="height: 100%;">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <p class="h4 text-center">Actualizar datos</p>
            <form action="/AplicacionTCU/Admin/updateCoachInfo" method="post" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="last_name">Apellido:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="phone">Teléfono:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="" required>
                </div>
                <div class="text-center form-group py-2">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>