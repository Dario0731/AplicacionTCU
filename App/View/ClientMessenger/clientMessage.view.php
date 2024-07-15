<?php include(CONFIG['public_path'] . 'header.client.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <form action="<?= route('ClientMessenger', 'sendMessage') ?>" method="POST">
            <div class="form-group">
                                    <div class="form-group py-1">
                        <label for="clients_comments">Mensaje para el entrenador:</label>
                        <textarea class="form-control text-center" id="message" name="message" required rows="2"></textarea>
                    </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </div>
        </form>
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
