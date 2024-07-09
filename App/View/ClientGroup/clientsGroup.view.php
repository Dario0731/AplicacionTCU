<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
        <div class="pt-2 pb-2"><p class="h2">Administrar integrantes del grupo</p></div>
    <div class="pt-2 text-center"><p class="h1"><!--Nombre del grupo:--> <?= viewbag("grupos")[0]['groupName']; ?></p></div>
    <div class="pt-2 pb-4 text-center"><p class="h5"><!--Descripción del grupo:--> <?= viewbag("grupos")[0]['groupComments']; ?></p></div>
    <div class="pt-2 pb-2"><p class="h2">Integrantes del grupo</p></div>
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Disciplina(s)</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("grupos")) && !empty(viewbag("grupos")[0]['clientName'])) : ?>
                    <?php foreach (viewbag("grupos") as $groups) : ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($groups['clientName']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($groups['discipline']) ?></td>
                            <td class="text-center">
                                <a class="px-2" href="<?= route('Admin', 'editclient', ['email' => $groups['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/edit-icon.svg" alt="icono de editar al cliente" style="height: 20px;"></a>
                                <button type="button" class="btn delete-btn" data-id="<?= $groups['id'] ?>" data-groupid="<?= $groups['groupID'] ?>"><img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></button>
                                <a class="px-2" href="<?= route('Admin', 'clientsInfo', ['email' => $groups['email']]) ?>"><img src="<?= CONFIG['assets'] ?>img/eye-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-white text-center">No existen clientes en este grupo aún</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-end"><a href="<?= route('sportgroup', 'groups') ?>" class="btn btn-primary">Volver</a></div>
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
        var groupId = $(this).data('groupid'); // Ajustado para coincidir con el atributo 'data-groupid'

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
                    url: '/AplicacionTCU/ClientGroup/removeClient', // Asegúrate de ajustar la ruta según tu estructura de carpetas
                    type: 'POST',
                    data: {
                        id: clientId,
                        groupID: groupId // Ajustado para coincidir con el nombre del parámetro en PHP
                    },
                    success: function (response) {
                        try {
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                row.remove();
                                Swal.fire(
                                    '¡Eliminado!',
                                    'El cliente ha sido eliminado del grupo.',
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
                            console.error('Error parsing JSON:', e);
                            Swal.fire(
                                'Error',
                                'Hubo un problema con la solicitud.',
                                'error'
                            );
                        }
                    },
                    error: function () {
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
