<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container" style="height: 100%;">
    <div class="row justify-content-center pt-5">
        <p class="text-center h3">Editar datos del cliente</p>
        <form action="/AplicacionTCU/ClientManagement/insertClient" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="row">
                    <div class="col">
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
                    </div>
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="discipline">Disciplina:</label>
                            <input type="text" class="form-control" id="discipline" name="discipline" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="weight">Peso:</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="discipline">Altura:</label>
                            <input type="text" class="form-control" id="height" name="height" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="pay">Fecha del próximo pago:</label>
                            <input type="date" class="form-control" id="pay" name="pay" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="last_name">Comentarios:</label>
                            <input type="text" class="form-control" id="comments" name="comments" value="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center form-group py-2">
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
        </form>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>