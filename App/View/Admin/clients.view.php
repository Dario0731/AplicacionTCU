<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4 d-flex flex-column min-vh-100">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th class="text-center">Correo electrónico</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Disciplina(s)</th>
                <th class="text-center">Peso</th>
                <th class="text-center">Estatura</th>
                <th class="text-center">Fecha de pago</th>
                <th class="text-center">Comentarios</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array(viewbag("clientes"))) : ?>
                <?php foreach (viewbag("clientes") as $clients) : ?>
                    <tr id="cliente-<?= $clients['id'] ?>">
                        <td class="text-center"><?= $clients['email'] ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['name']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['last_name']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['phone']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['discipline']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['weight']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['height']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['pay_date']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['coments']) ?></td>
                        <td class="text-center">
                            <a class="px-1" href="<?= route('Admin', 'editclient', ['email' => $clients['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/edit-icon.svg" alt="icono de editar al cliente" style="height: 20px;"></a>
                            <button type="button" class="btn delete-btn px-1" data-id="<?= $clients['id'] ?>"><img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></button>
                            <a class="px-1" href="<?= route('Admin', 'clientsInfo', ['email' => $clients['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/eye-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></a>
                            <a class="px-1" href="<?= route('Admin', 'graphic', ['email' => $clients['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/graphic-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></a>
                        </td>
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

    $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            var clientId = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar',
                background: 'linear-gradient(to bottom, #011242, #001136)',
                color: '#fff',
                iconColor: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/AplicacionTCU/ClientManagement/removeClient', // Asegúrate de ajustar la ruta según tu estructura de carpetas
                        type: 'POST',
                        data: {
                            id: clientId
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                row.remove();
                                Swal.fire(
                                    '¡Eliminado!',
                                    'El cliente ha sido eliminado.',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error',
                                    result.message,
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'Hubo un problema con la solicitud.',
                                'error',
                                'linear-gradient(to bottom, #011242, #001136)',
                                '#fff',
                                '#fff'
                            );
                        }
                    });
                }
            });
        });
    });
</script>