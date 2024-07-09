<?php include(CONFIG['public_path'] . 'header.admin.php'); 
$idNuevo=viewbag("grupos")[0]['groupID'];
?>
        <div class="col-md-6">
            <p class="h4 text-center">Actualizar grupo</p>
            <form action="/AplicacionTCU/SportGroup/updateGroup" method="post" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="text">Nombre del grupo:</label>
                    <input type="text" class="form-control" id="name" name="name"  value="<?= viewbag("grupos")[0]['groupName']; ?>" required>
                </div>
                <div class="form-group py-2">
                    <label for="name">Comentarios del grupo:</label>
                    <input type="text" class="form-control" id="comments" name="comments"  value="<?= viewbag("grupos")[0]['groupComments']; ?>"  required>
                </div>
                
                <input hidden type="text" class="form-control" id="id" name="id"  value="<?= viewbag("grupos")[0]['groupID']; ?>"  required>
                <div class="text-center form-group py-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                            </form>
        <div class="text-center form-group py-2">
            <div class="text-end"><a class="btn btn-primary" href="<?= route('clientgroup', 'editClients', ['id' => $idNuevo]) ?>">Administrar integrantes</a></div>
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
