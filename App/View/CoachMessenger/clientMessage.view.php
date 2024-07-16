<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <form action="<?= route('coachmessenger', 'sendMessage') ?>" method="POST">
            <div class="form-group">
                <label for="selectClient" class="text-white py-2">Seleccionar Cliente:</label>
                <select class="form-control" id="selectClient" name="client_id" required>
                    <option value="" selected disabled>Seleccione un cliente</option>
                    <?php if (is_array(viewbag("clientes"))) : ?>
                        <?php foreach (viewbag("clientes") as $client) : ?>
                            <option value="<?= $client['id'] ?>">
                                <?= htmlspecialchars($client['name']) . ' ' . htmlspecialchars($client['last_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <option value="" disabled>No hay clientes disponibles</option>
                    <?php endif; ?>
                </select>
                <div class="form-group">
                    <label for="clients_comments" class="py-2">Mensaje para el cliente:</label>
                    <textarea class="form-control" id="message" name="message" required rows="4"></textarea>
                </div>
            </div>
            <div class="form-group text-center py-3">
                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </div>
            <br>
            <br>
            <div class="form-group text-center">
                <label for="clients_comments">Si quiere seleccionar un grupo de clientes presione aquí: 
                    <a class="btn btn-primary" href="<?= route('coachmessenger', 'groupMessage') ?>">Ir a grupos</a>
                </label>
            </div>
        </form>
        <div class="form-group text-center py-3">
            <a class="btn btn-primary" href="<?= route('admin', 'home') ?>">Volver</a>
        </div>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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