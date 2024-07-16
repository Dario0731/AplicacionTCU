<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">De</th>
                    <th class="text-center">Mensaje</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Hora</th>
                    <th class="text-center">Visto</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("messages"))) : ?>
                    <?php foreach (viewbag("messages") as $message) : ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($message['clientName']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['message']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['date']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['time']) ?></td>

                            <td class="text-center">
                                <button type="button" class="btn read-btn border border-0" data-id="<?= $message['id'] ?>">
                                    <img src="<?= CONFIG['assets'] ?>img/add-client.svg" alt="icono de eliminar al cliente" style="height: 20px;">
                                </button>
                                <?= $message['isRead'] == 0 ? 'Entregado' : 'Visto' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-white">No hay datos disponibles</td>
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

    $('.read-btn').on('click', function () {
        var button = $(this); // Captura el botón que se hizo clic
        var id = button.data('id');

        $.ajax({
            url: '/AplicacionTCU/CoachMessenger/updateMessage',
            type: 'POST',
            data: {
                id: id
            },

            success: function (response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire(
                                '¡Acualizado!',
                                'El mensaje se ha marcado como visto.',
                                'success'
                                );

                        // Cambiar el icono del botón después de la inserción exitosa
         //               button.html('<img src="<?= CONFIG['assets'] ?>img/check-icon.svg" alt="Cliente eliminado del grupo" style="height: 20px;">');
          //              button.prop('disabled', true);
                    } else {
                        Swal.fire(
                                'Error',
                                result.message,
                                'error'
                                );
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e, response);
                    console.log(response);
                    Swal.fire(
                            'Error',
                            'Hubo un problema con la respuesta del servidor.',
                            'error'
                            );
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error, xhr);
                console.log(response);
                Swal.fire(
                        'Error',
                        'Hubo un problema con la solicitud.',
                        'error'
                        );
            }
        });
    });
</script>
