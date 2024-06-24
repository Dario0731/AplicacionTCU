<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode("~", viewbag("client_info"));

// Verificar si hay suficientes partes
$name = $parts[0] . " " . $parts[1];
$discipline = $parts[2];
$weight = $parts[3];
$height = $parts[4];
$pay_date = $parts[5];
$coments = $parts[6];
$fat = $parts[7];
$muscle = $parts[8];
$comentsClient = $parts[9];
$email = $parts[10];
?>
<div class="container">
    <div class="row justify-content-center pt-5">
        <p class="text-center h3">Editar datos del cliente</p>
        <form action="/AplicacionTCU/ClientManagement/updateClient" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="form-group py-2">
                    <input hidden value="<?= htmlspecialchars($email); ?>" type="text" class="form-control" id="email" name="email" required readonly>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="name">Nombre:</label>
                            <input value="<?= htmlspecialchars($name); ?>" type="text" class="form-control" id="discipline" name="name" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="pay">Fecha del próximo pago:</label>
                            <input value="<?= htmlspecialchars($pay_date); ?>" type="date" class="form-control" id="pay" name="pay" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="weight">Peso:</label>
                            <input value="<?= htmlspecialchars($weight); ?>" type="text" class="form-control" id="weight" name="weight" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="discipline">Altura:</label>
                            <input value="<?= htmlspecialchars($height); ?>" type="text" class="form-control" id="height" name="height" value="" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="comments">Comentarios personales hacia el cliente:</label>
                            <input value="<?= htmlspecialchars($coments); ?>" type="text" class="form-control" id="comments" name="comments" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="discipline">Disciplina:</label>
                            <input value="<?= htmlspecialchars($discipline); ?>" type="text" class="form-control" id="discipline" name="discipline" value="" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="fat">Porcentaje de grasa:</label>
                            <input type="text" class="form-control" id="discipline" name="fat" value="<?= htmlspecialchars($fat); ?>" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="mucle">Porcentaje de músculo:</label>
                            <input type="text" class="form-control" id="mucle" name="mucle" value="<?= htmlspecialchars($muscle); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group py-2">
                    <label for="clients_comments">Comentarios para el cliente:</label>
                    <textarea class="form-control" id="clients_comments" name="clients_comments" rows="3"><?= htmlspecialchars($comentsClient); ?></textarea>
                </div>

            </div>
            <div class="text-center form-group py-2">
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
        </form>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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