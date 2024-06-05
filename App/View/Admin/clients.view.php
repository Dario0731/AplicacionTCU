<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <p class="text-center h3">Registrar nuevo cliente</p>
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
                <div class="form-group py-2">
                    <label for="birthday">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="discipline">Disciplina:</label>
                    <input type="text" class="form-control" id="discipline" name="discipline" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="weight">Peso:</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="discipline">Altura:</label>
                    <input type="height" class="form-control" id="height" name="height" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="pay">Fecha del próximo pago:</label>
                    <input type="date" class="form-control" id="pay" name="pay" value="" required>
                </div>
                <div class="text-center form-group py-2">
                    <button type="submit" class="btn btn-primary">Registrar cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>