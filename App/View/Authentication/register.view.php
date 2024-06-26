<div class="container justify-content-center pt-5 form-container">
    <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="text-white">
            <a href="<?= route('home', 'index') ?>">
                <img src="<?= CONFIG['assets'] ?>img/leave-arrow.svg" alt="Salir" style="height: 27px;">
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <img src="<?= CONFIG['assets'] ?>img/login-icon.svg" alt="login-icon" style="height: 5rem" />
        </div>
        <form class="p-3" action="/AplicacionTCU/Authentication/registUser" method="POST">
            <div class="text-white text-center fs-1 fw-bold">Registrarse</div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="<?= CONFIG['assets'] ?>img/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input name="email" class="form-control bg-light" type="email" placeholder="correo electrónico" required />
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="<?= CONFIG['assets'] ?>img/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input name="password" class="form-control bg-light" type="password" placeholder="contraseña" required />
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="<?= CONFIG['assets'] ?>img/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input name="confirm_password" class="form-control bg-light" type="password" placeholder="confirmar contraseña" required  />
            </div>
            <div class="btn btn-info text-white w-100 mt-2 fw-semibold shadow-sm">
                <a class="text-decoration-none text-white text-content-center">
                    <button type="submit" class="btn text-white">Registrarse</button>
                </a>
            </div>
            <div class="d-flex gap-1 justify-content-center mt-1">
                <div>¿Ya posees una cuenta?</div>
            </div>
            <div class="text-center">
                <a href="<?= route('authentication', 'login') ?>" class="text-decoration-none text-info fw-semibold p-3 text-center">Iniciar Sesión</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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