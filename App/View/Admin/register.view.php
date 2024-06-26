<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
    <div class="row justify-content-center pt-2">
        <p class="text-center h3">Registrar nuevo cliente</p>
        <form action="/AplicacionTCU/ClientManagement/insertClient" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="row">
                    <div class="col">
                        <div class="form-group py-1">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="last_name">Apellido:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="phone">Teléfono:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="birthday">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="mucle">Porcentaje de músculo:</label>
                            <input type="text" class="form-control" id="mucle" name="muscle" value="" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group py-1">
                            <label for="discipline">Disciplina:</label>
                            <input type="text" class="form-control" id="discipline" name="discipline" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="weight">Peso:</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="discipline">Altura:</label>
                            <input type="text" class="form-control" id="height" name="height" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="pay">Fecha del próximo pago:</label>
                            <input type="date" class="form-control" id="pay" name="pay" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="last_name">Comentarios(el cliente no los verá):</label>
                            <input type="text" class="form-control" id="comments" name="comments" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="fat">Porcentaje de grasa:</label>
                            <input type="text" class="form-control" id="discipline" name="fat" value="" required>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <label for="clients_comments">Comentarios para el cliente:</label>
                        <textarea class="form-control" id="clients_comments" name="clients_comments" required rows="2"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center form-group py-2">
                <button type="submit" class="btn btn-primary">Registrar cliente</button>
            </div>
        </form>
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