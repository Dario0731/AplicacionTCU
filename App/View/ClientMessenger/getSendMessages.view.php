<?php include(CONFIG['public_path'] . 'header.client.php'); ?>
<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Para: </th>
                    <th class="text-center">De: </th>
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
                            <td class="text-center"><?= htmlspecialchars($message['clientName']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['message']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['date']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($message['time']) ?></td>
                            <td class="text-center">
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
</script>
