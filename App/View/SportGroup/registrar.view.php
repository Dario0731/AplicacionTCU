<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container" style="height: 100%;">
    <div class="row justify-content-center pt-2">
        <p class="text-center h3">Registrar nuevo grupo</p>
        <form action="/AplicacionTCU/SportGroup/insertGroup" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="form-group py-2">
                    <label for="name" class="py-2">Nombre:</label>
                    <input type="text" class="form-control text-center" id="name" name="name" value="" required>
                </div>
                <div class="form-group py-2">
                    <label for="clients_comments" class="py-2">Comentarios:</label>
                    <textarea class="form-control text-center" id="comments" name="comments" required rows="3"></textarea>
                </div>
            </div>
            <div class="text-center form-group py-3">
                <button type="submit" class="btn btn-primary">Registrar y avanzar a la selección de clientes</button>
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