<?php include(CONFIG['public_path'] . 'header.client.php') ?>
<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("client_info"));

// Verificar si hay suficientes partes
$name = $parts[0];
$payDate = $parts[1];
$image = $parts[2];
?>
<div class="container">
    <div class="container text-center p-3">
        <div class="row align-items-start">
            <div class="col">
                <span>Fecha del proximo pago: <?= $payDate ?></span>
            </div>
            <div class="col">
                <h1 class="pb-5">Bienvenido <?= $name ?></h1>
                <div class="text-center p-5 justify-content-center">
                    <img   src="<?= CONFIG['assets'] ?><?= $image ?>" alt="Imagen de inicio" style="height: 400px;">

                </div>
                <div>
                    <h1>Mi progreso</h1>
                    <h1>Ver clases</h1>
                    <h1>ETC</h1>
                </div>
            </div>
            <div class="col">
                <img src="../Public/Assets/img/home-image.svg" alt="home-image" style="height: 5rem" />
            </div>
        </div>
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