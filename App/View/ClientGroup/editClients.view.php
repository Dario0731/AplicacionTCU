<?php include(CONFIG['public_path'] . 'header.admin.php'); 
$idNuevo=viewbag("grupInfo")[0]['groupID'];
?>

<div class="container p-4">
        <div class="pt-2 pb-2"><p class="h2">Agregar integrantes</p></div>
    <div class="pt-2 text-center"><p class="h1"><?= viewbag("grupInfo")[0]['groupName']; ?></p></div>
    <div class="pt-2 pb-4 text-center"><p class="h5"><?= viewbag("grupInfo")[0]['groupComments']; ?></p></div>
    <div class="pt-2 pb-2"><p class="h2">Agregar integrantes al grupo</p></div>
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Disciplina(s)</th>
                    <th class="text-center">Peso</th>
                    <th class="text-center">Estatura</th>
                    <th class="text-center">Comentarios</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("grupos"))) : ?>
                    <?php foreach (viewbag("grupos") as $clients) : ?>
                        <tr id="cliente-<?= $clients['id'] ?>">
                            <td class="text-center"><?= htmlspecialchars($clients['clientName']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($clients['discipline']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($clients['weight']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($clients['height']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($clients['comments']) ?></td>
                            <td class="text-center">
                                <button type="button" class="btn insert-btn border border-0" data-id="<?= $clients['id'] ?>" data-group="<?= htmlspecialchars(urldecode($_GET['id'])) ?>">
                                    <img src="<?= CONFIG['assets'] ?>img/add-client.svg" alt="icono de eliminar al cliente" style="height: 20px;">
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-white">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-end"><a href="<?= route('sportgroup', 'groups') ?>" class="btn btn-primary">Volver</a></div>
                <div class="text-end"><a href="<?=route('ClientGroup', 'clientsGroup', ['id' => $idNuevo])?>" class="btn btn-primary">Ver integrantes del grupo</a></div>
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

   $('.insert-btn').on('click', function() {
        var button = $(this); // Captura el botón que se hizo clic
        var clientId = button.data('id');
        var groupName = button.data('group');

        $.ajax({
            url: '/AplicacionTCU/ClientGroup/insertClientGroup',
            type: 'POST',
            data: {
                group_name: groupName,
                client_id: clientId
            },
            success: function(response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire(
                            '¡Insertado!',
                            'El cliente ha sido insertado en el grupo.',
                            'success'
                        );

                        // Cambiar el icono del botón después de la inserción exitosa
                        button.html('<img src="<?= CONFIG['assets'] ?>img/check-icon.svg" alt="Cliente eliminado del grupo" style="height: 20px;">');
                        button.prop('disabled', true);
                    } else {
                        Swal.fire(
                            'Error',
                            result.message,
                            'error'
                        );
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e, response);
                    Swal.fire(
                        'Error',
                        'Hubo un problema con la respuesta del servidor.',
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error, xhr);
                Swal.fire(
                    'Error',
                    'Hubo un problema con la solicitud.',
                    'error'
                );
            }
        });
    });

</script>
