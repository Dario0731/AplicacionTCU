<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container p-4">
    <div class="" style="height: 100%;">
        <form action="<?= route('event', 'sendGroupEvent') ?>" method="POST">
            <div class="form-group">
        <div class="form-group py-2">
            <label for="text" class="py-2">Evento: </label>
            <input type="text" class="form-control text-center" id="name" name="idEvento" value="<?= viewbag("events")[0]['title']; ?>" required>
                   <input type="hidden" name="eventID" value="<?= viewbag('events')[0]['id']; ?>">
        </div>
                
                            <label for="text" class="py-2">Grupo: </label>
                <select class="form-control" id="selectClient" name="groupID" required>
                    <option value="" selected disabled>Seleccione un grupo</option>
                    <?php if (is_array(viewbag("groups"))) : ?>
                        <?php foreach (viewbag("groups") as $client) : ?>
                            <option value="<?= $client['id'] ?>">
                                <?= htmlspecialchars($client['groupName']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <option value="" disabled>No hay grupos disponibles</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group text-center py-3">
                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </div>
            <div class="form-group text-center">
                <div class="text-center"><a class="btn btn-primary" href="<?= route('coachmessenger', 'clientMessage') ?>">Volver</a></div>
            </div>
        </form>
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
</script>