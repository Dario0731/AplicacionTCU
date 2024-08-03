<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Título</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Fecha de inicio</th>
                    <th class="text-center">Fecha de fin</th>
                    <th class="text-center">Color</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("events"))) : ?>
                    <?php foreach (viewbag("events") as $events) : ?>
                        <tr id="cliente-<?= $events['id'] ?>">
                            <td class="text-center"><?= $events['title'] ?></td>
                            <td class="text-center"><?= htmlspecialchars($events['description']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($events['startDate']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($events['endDate']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($events['color']) ?></td>
                            <td class="text-center">
                                <a class="px-1" href="<?= route('Admin', 'editclient', ['email' => $clients['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/edit-icon.svg" alt="icono de editar al cliente" style="height: 20px;"></a>
                                <button type="button" class="btn delete-btn px-1" data-id="<?= $events['id'] ?>"><img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></button>
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

    $(document).ready(function () {
        $('.delete-btn').on('click', function () {
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
                        url: '/AplicacionTCU/event/removeEvent', // Asegúrate de ajustar la ruta según tu estructura de carpetas
                        type: 'POST',
                        data: {
                            id: clientId
                        },
                        success: function (response) {
                            console.log(response);
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                row.remove();
                                Swal.fire(
                                        '¡Eliminado!',
                                        'El evento ha sido eliminado.',
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
                        error: function () {

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