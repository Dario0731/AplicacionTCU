<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("coach_info"));

// Verificar si hay suficientes partes
$name = $parts[0];
$image = $parts[1];
?>
<div class="container">
    <h1 class="text-center p-3 text-uppercase">BIENVENIDO COACH <?= $name ?></h1>
    <div class="text-center p-5">
        <img   src="<?= CONFIG['assets']?><?= $image ?>" alt="Imagen de inicio">
      
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