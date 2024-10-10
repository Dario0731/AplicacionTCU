<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>


<div class="container p-4 d-flex flex-column min-vh-100">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th class="text-center">Fecha de registro</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Peso</th>
                <th class="text-center">Altura</th>
                <th class="text-center">comentarios personales</th>
                <th class="text-center">Disciplina(s)</th>
                <th class="text-center">Porcentaje de grasa</th>
                <th class="text-center">Porcentaje de músculo</th>
                <th class="text-center">Comentarios al cliente</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array(viewbag("clientes"))) : ?>
                <?php foreach (viewbag("clientes") as $clients) : ?>
                    <tr id="cliente-<?= $clients['progress_id'] ?>">
                        <td class="text-center"><?= $clients['progress_date'] ?></td>
                        <td class="text-center"><?= $clients['name'] . ' ' . $clients['last_name'] ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['weight']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['height']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['comments']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['discipline']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['fat_percentage']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['muscle_percentage']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($clients['client_comments']) ?></td>
                        <td class="text-center">
                            <button type="button" class="btn delete-btn" data-id="<?= $clients['progress_id'] ?>">
                                <img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;">
                            </button>
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
                        url: '/AplicacionTCU/ClientManagement/removeProgress',
                        type: 'POST',
                        data: {
                            id: clientId
                        },
                        success: function(response) {

                            try {
                                var result = JSON.parse(response);
                                if (result.status === 'success') {
                                    row.remove();
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'El progreso seleccionado del cliente ha sido eliminado.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error',
                                        result.message,
                                        'error'
                                    );
                                }
                            } catch (e) {
                                console.log(response);
                                Swal.fire(
                                    'Error',
                                    'Respuesta del servidor no válida.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'Hubo un problema con la solicitud.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>