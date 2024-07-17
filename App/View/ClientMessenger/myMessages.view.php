<?php include(CONFIG['public_path'] . 'header.client.php'); ?>

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
                            <td class="text-center"><?= htmlspecialchars($message['coachName']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['message']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['date']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['time']) ?></td>
                            <td class="text-center">
                                <?php if ($message['isRead'] == 0) { ?>
                                    <button type="button" class="btn read-btn" data-id="<?= $message['id'] ?>"><img src="<?= CONFIG['assets'] ?>img/see-message.svg" alt="icono leer mensaje" style="height: 20px;"></button>
                                <?php } else { ?> <img src="<?= CONFIG['assets'] ?>img/seen-icon.svg" alt="icono de mensaje visto" style="height: 28px;">
                                <?php }  ?>
                                <div><?= $message['isRead'] == 0 ? 'Marcar como visto' : 'Visto' ?></div>
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
        <div class="form-group text-center">
            <div class="text-center"><a class="btn btn-primary" href="<?= route('client', 'home') ?>">Volver</a></div>
        </div>
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
    $('.read-btn').on('click', function() {
        var button = $(this); // Captura el botón que se hizo clic
        var id = button.data('id');

        $.ajax({
            url: '/AplicacionTCU/ClientMessenger/updateMessage',
            type: 'POST',
            data: {
                id: id
            },

            success: function(response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire(
                            '¡Acualizado!',
                            'El mensaje se ha marcado como visto.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
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
            error: function(xhr, status, error) {
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