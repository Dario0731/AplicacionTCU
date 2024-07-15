<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>
<div class="container p-4">
    <div class="" style="height: 100%;">
        <div class="" style="height: 100%;">
            <label for="selectClient" class="text-white">Selecciona un cliente para ver los mensajes enviados a él</label>
            <form action="<?= route('coachmessenger', 'getSendMessages') ?>" method="GET">
                <div class="form-group">
                    <label for="selectClient" class="text-white">Seleccionar Cliente:</label>
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
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Ver mensajes</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="container p-4">

</div>
<?php include(CONFIG['public_path'] . 'footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
