<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
    <div class="row justify-content-center pt-2">
        <p class="text-center h3">Crear evento</p>
        <form action="/AplicacionTCU/Event/createEvent" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="row">
                    <div class="col">
                        <div class="form-group py-1">
                            <label for="name">Título del evento:</label>
                            <input type="text" class="form-control text-center" id="name" name="title" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="last_name">Descripción:</label>
                            <input type="text" class="form-control text-center" id="last_name" name="description" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="pay">Fecha de inicio:</label>
                            <input type="date" class="form-control text-center" id="pay" name="startDate" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="pay">Fecha de fin:</label>
                            <input type="date" class="form-control text-center" id="pay" name="endDate" value="" required>
                        </div>
                        <div class="form-group py-1">
                            <label for="last_name">Color:</label>
                            <input type="text" class="form-control text-center" id="last_name" name="color" value="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center form-group py-2">
                <button type="submit" class="btn btn-primary">Registrar evento</button>
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