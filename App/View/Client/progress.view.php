<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>


<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Fecha de registro</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Peso</th>
                    <th class="text-center">Altura</th>
                    <th class="text-center">Disciplina(s)</th>
                    <th class="text-center">Porcentaje de grasa</th>
                    <th class="text-center">Porcentaje de músculo</th>
                    <th class="text-center">Comentarios</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("clientes"))) : ?>
                    <?php foreach (viewbag("clientes") as $cliente) : ?>
                        <tr id="cliente-<?= $cliente['progress_id'] ?>">
                            <td class="text-center"><?= $cliente['progress_date'] ?></td>
                            <td class="text-center"><?= $cliente['name'] . ' ' . $cliente['last_name'] ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['weight']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['height']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['discipline']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['fat_percentage']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['muscle_percentage']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['client_comments']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10" class="text-white">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
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
