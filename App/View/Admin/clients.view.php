<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-white">Correo electrónico</th>
                    <th class="text-white">Nombre</th>
                    <th class="text-white">Apellido</th>
                    <th class="text-white">Teléfono</th>
                    <th class="text-white">Disciplina(s)</th>
                    <th class="text-white">Peso</th>
                    <th class="text-white">Estatura</th>
                    <th class="text-white">Fecha de pago</th>
                    <th class="text-white">Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("clientes"))) : ?>
                    <?php foreach (viewbag("clientes") as $cliente) : ?>
                        <tr>
                            <td class="text-white"><?= $cliente['email'] ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['name']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['last_name']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['phone']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['discipline']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['weight']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['height']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['pay_date']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($cliente['coments']) ?></td>
                            <td class="text-center">
                                <a class="px-2" href="<?= route('admin', 'editClient') ?>"><img src="<?= CONFIG['assets'] ?>img/edit-icon.svg" alt="icono de editar al cliente" style="height: 20px;"></a>
                                <button type="submit" class="btn"><img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" class="text-white">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include(CONFIG['public_path'] . 'footer.php'); ?>
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